<?php
include '../db/formdb.php';
ob_start();

// Function to get user's location based on IP address
function getUserLocation() {
    $location_data = array(
        'city' => 'Location not available',
        'latitude' => 0,
        'longitude' => 0
    );
    
    // Get user's IP address
    $user_ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $user_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $user_ip = $_SERVER['REMOTE_ADDR'];
    }
    
    // Skip location detection for local/private IPs
    if (empty($user_ip) || 
        $user_ip === '127.0.0.1' || 
        $user_ip === '::1' || 
        strpos($user_ip, '192.168.') === 0 || 
        strpos($user_ip, '10.') === 0 || 
        strpos($user_ip, '172.16.') === 0) {
        return $location_data;
    }
    
    try {
        // Try multiple IP geolocation services
        $services = [
            "http://ip-api.com/json/{$user_ip}?fields=city,regionName,lat,lon,status",
            "https://ipapi.co/{$user_ip}/json/",
            "http://www.geoplugin.net/json.gp?ip={$user_ip}"
        ];
        
        foreach ($services as $service_url) {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'user_agent' => 'Mozilla/5.0 (compatible; FormFusion/1.0)'
                ]
            ]);
            
            $response = @file_get_contents($service_url, false, $context);
            if ($response !== false) {
                $data = json_decode($response, true);
                
                // Handle different API response formats
                if (strpos($service_url, 'ip-api.com') !== false) {
                    if (isset($data['status']) && $data['status'] === 'success') {
                        $location_data['city'] = $data['city'] . ', ' . $data['regionName'];
                        $location_data['latitude'] = floatval($data['lat']);
                        $location_data['longitude'] = floatval($data['lon']);
                        break;
                    }
                } elseif (strpos($service_url, 'ipapi.co') !== false) {
                    if (isset($data['city']) && !isset($data['error'])) {
                        $location_data['city'] = $data['city'] . ', ' . $data['region'];
                        $location_data['latitude'] = floatval($data['latitude']);
                        $location_data['longitude'] = floatval($data['longitude']);
                        break;
                    }
                } elseif (strpos($service_url, 'geoplugin.net') !== false) {
                    if (isset($data['geoplugin_city']) && $data['geoplugin_city'] !== '') {
                        $location_data['city'] = $data['geoplugin_city'] . ', ' . $data['geoplugin_regionName'];
                        $location_data['latitude'] = floatval($data['geoplugin_latitude']);
                        $location_data['longitude'] = floatval($data['geoplugin_longitude']);
                        break;
                    }
                }
            }
        }
    } catch (Exception $e) {
        error_log("Location detection error: " . $e->getMessage());
    }
    
    return $location_data;
}

// Error handling and input validation
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Form ID is required.");
}

$id = trim($_GET['id']);
$refer_code = isset($_GET['r']) ? trim($_GET['r']) : '';

try {
    // Get form details with proper error handling
    $stmt = $conn1->prepare("SELECT * FROM forms WHERE f_id = ?");
    if (!$stmt) {
        throw new Exception("Database prepare failed: " . $conn1->error);
    }
    
    $stmt->bind_param("s", $id);
    if (!$stmt->execute()) {
        throw new Exception("Database execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        $stmt->close();
        die("Form not found.");
    }
    
    $row = $result->fetch_assoc();
    $stmt->close();

    // Extract form data
    $form_id = $row['f_id'];
    $c_url = $row['c_url'];
    $title = $row['title'];
    $img_url = $row['img_url'];
    $status = (int)$row['status'];
    $isActiveVender = (int)$row['isActiveVender'];
    $limit = $row['res_limit'] ? (int)$row['res_limit'] : null;

    // Handle form status and limits
    if ($limit === null && $status == 1) {
        $status = 1;
    } elseif ($limit === null && $status == 0) {
        $status = 0;
    } elseif ($limit === 0) {
        $status = 0;
        $stmt = $conn1->prepare("UPDATE forms SET status = 0 WHERE res_limit = 0 AND f_id = ?");
        if ($stmt) {
            $stmt->bind_param("s", $form_id);
            $stmt->execute();
            $stmt->close();
        }
    }

} catch (Exception $e) {
    error_log("Form loading error: " . $e->getMessage());
    die("An error occurred while loading the form. Please try again later.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FormFusion</title>

    <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        .bg-img{
            z-index: -100;
            width: 100vw;
            height: 30vh;
            background-color: black;
            background: url('../<?php echo htmlspecialchars($img_url); ?>');
            background-size: cover;
            background-position: 50%;
        }
        .card {
            width: 50%;
        }
        
        @media (max-width: 576px) {
            .card {
                width: 80%;
            }
        }
        
        .loading-location {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<?php if ($status == 1): ?>
<body>
    <div class="bg-img position-absolute"></div>
    <div class="d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="header-title">
                    <h4 class="card-title"><?php echo htmlspecialchars($title); ?></h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" id="mainForm">
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="name">Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required maxlength="100">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="number">Number<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="tel" name="number" class="form-control" id="number" placeholder="Enter 10-digit mobile number" required pattern="[6-9][0-9]{9}" maxlength="10">
                            <small class="form-text text-muted">Enter valid Indian mobile number (10 digits starting with 6-9)</small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="email">Email<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required maxlength="255">
                        </div>
                    </div>
                    
                    <?php if ($isActiveVender): ?>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="vender">Vender Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="vender" class="form-control" id="vender" placeholder="Enter Vender Name" required maxlength="100">
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary w-50 rounded" id="submitBtn">Submit</button>
                        <!-- Hidden inputs for location data - will be populated by JavaScript -->
                        <input type="hidden" id="userLocation" name="user_location" value="">
                        <input type="hidden" id="userLatitude" name="user_latitude" value="0">
                        <input type="hidden" id="userLongitude" name="user_longitude" value="0">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Background Location Detection Script -->
    <script>
        let locationData = {
            city: '',
            latitude: 0,
            longitude: 0,
            detected: false
        };

        // Function to get location using IP (fallback)
        async function getLocationByIP() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();
                if (data.city && data.region && !data.error) {
                    return {
                        city: data.city + ', ' + data.region,
                        latitude: data.latitude || 0,
                        longitude: data.longitude || 0
                    };
                }
                return null;
            } catch (error) {
                console.log('IP location failed:', error);
                return null;
            }
        }

        // Function to get precise GPS location
        function getLocationByGPS() {
            return new Promise((resolve, reject) => {
                if (!navigator.geolocation) {
                    reject(new Error('Geolocation not supported'));
                    return;
                }
                
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        try {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;
                            
                            // Reverse geocoding to get city name
                            const response = await fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lng}&localityLanguage=en`);
                            const data = await response.json();
                            
                            resolve({
                                city: data.city || data.locality || 'GPS Location',
                                latitude: lat,
                                longitude: lng
                            });
                        } catch (error) {
                            // Even if reverse geocoding fails, we have coordinates
                            resolve({
                                city: 'GPS Location',
                                latitude: position.coords.latitude,
                                longitude: position.coords.longitude
                            });
                        }
                    },
                    (error) => {
                        reject(error);
                    },
                    {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 300000
                    }
                );
            });
        }

        // Main background location detection
        async function detectLocationSilently() {
            try {
                // First try GPS for precise location
                try {
                    const gpsLocation = await getLocationByGPS();
                    locationData = {
                        city: gpsLocation.city,
                        latitude: gpsLocation.latitude,
                        longitude: gpsLocation.longitude,
                        detected: true
                    };
                    console.log('GPS location detected:', gpsLocation.city);
                    return;
                } catch (gpsError) {
                    console.log('GPS denied or failed, falling back to IP location');
                }
                
                // Fallback to IP location
                const ipLocation = await getLocationByIP();
                if (ipLocation) {
                    locationData = {
                        city: ipLocation.city,
                        latitude: ipLocation.latitude,
                        longitude: ipLocation.longitude,
                        detected: true
                    };
                    console.log('IP location detected:', ipLocation.city);
                } else {
                    console.log('All location detection methods failed');
                }
            } catch (error) {
                console.log('Location detection error:', error);
            }
        }

        // Form submission with location data
        document.getElementById('mainForm').addEventListener('submit', function(e) {
            const number = document.getElementById('number').value;
            const email = document.getElementById('email').value;
            
            // Validate Indian mobile number
            const mobileRegex = /^[6-9]\d{9}$/;
            if (!mobileRegex.test(number)) {
                e.preventDefault();
                alert('Please enter a valid Indian mobile number (10 digits starting with 6-9)');
                return false;
            }
            
            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address');
                return false;
            }

            // Populate hidden location fields before submission
            document.getElementById('userLocation').value = locationData.city || '';
            document.getElementById('userLatitude').value = locationData.latitude || 0;
            document.getElementById('userLongitude').value = locationData.longitude || 0;
        });

        // Start location detection when page loads (completely silent)
        document.addEventListener('DOMContentLoaded', function() {
            detectLocationSilently();
        });
    </script>

    <?php
    // Form submission handling
    if (isset($_POST['submit'])) {
        try {
            // Get location data - prioritize client-side detection, fallback to server-side
            $location = 'Location not available';
            $latitude = 0;
            $longitude = 0;
            
            // Check if client-side location was detected
            if (!empty($_POST['user_location'])) {
                $location = trim($_POST['user_location']);
                $latitude = floatval($_POST['user_latitude']);
                $longitude = floatval($_POST['user_longitude']);
            } else {
                // Fallback to server-side IP detection
                $location_info = getUserLocation();
                $location = $location_info['city'];
                $latitude = $location_info['latitude'];
                $longitude = $location_info['longitude'];
            }
            
            // Sanitize and validate input
            $name = trim($_POST['name']);
            $number = trim($_POST['number']);
            $email = trim($_POST['email']);
            $vender = isset($_POST['vender']) ? trim($_POST['vender']) : '';
            $currentDateTime = date('Y-m-d g:i:s A');
            
            // Server-side validation
            if (empty($name) || strlen($name) > 100) {
                throw new Exception('Invalid name provided');
            }
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255) {
                throw new Exception('Invalid email provided');
            }
            
            // Validate Indian mobile number
            if (!preg_match('/^[6-9]\d{9}$/', $number)) {
                throw new Exception('Invalid Indian mobile number. Please enter a 10-digit number starting with 6-9.');
            }
            
            if ($isActiveVender && empty($vender)) {
                throw new Exception('Vender name is required');
            }
            
            // Check for duplicates
            $duplicate_stmt = $conn1->prepare("SELECT id FROM form_data WHERE field_1 = ? AND field_2 = ? AND field_3 = ? AND f_id = ? LIMIT 1");
            if (!$duplicate_stmt) {
                throw new Exception("Database error: " . $conn1->error);
            }
            
            $duplicate_stmt->bind_param("ssss", $name, $number, $email, $form_id);
            if (!$duplicate_stmt->execute()) {
                throw new Exception("Database error: " . $duplicate_stmt->error);
            }
            
            $duplicate_result = $duplicate_stmt->get_result();
            
            if ($duplicate_result->num_rows > 0) {
                $duplicate_stmt->close();
                throw new Exception('You have already submitted this form. Duplicate submissions are not allowed.');
            }
            $duplicate_stmt->close();
            
            // Insert form data
            $insert_stmt = $conn1->prepare("INSERT INTO form_data (form_title, refer_num, field_1, field_2, field_3, field_4, field_5, location_city, latitude, longitude, created_at, f_id) VALUES (?, ?, ?, ?, ?, ?, '', ?, ?, ?, ?, ?)");
            if (!$insert_stmt) {
                throw new Exception("Database prepare error: " . $conn1->error);
            }
            
            $refer_code_clean = !empty($refer_code) ? $refer_code : '';
            $insert_stmt->bind_param("ssssssssdds", $title, $refer_code_clean, $name, $number, $email, $vender, $location, $latitude, $longitude, $currentDateTime, $form_id);
            
            if (!$insert_stmt->execute()) {
                throw new Exception("Database insert error: " . $insert_stmt->error);
            }
            
            $last_rec = $conn1->insert_id;
            $insert_stmt->close();
            
            // Update response limit if needed
            if ($limit !== null && $limit > 0) {
                $dec_limit = $limit - 1;
                $limit_stmt = $conn1->prepare("UPDATE forms SET res_limit = ? WHERE f_id = ? AND res_limit = ?");
                if ($limit_stmt) {
                    $limit_stmt->bind_param("isi", $dec_limit, $form_id, $limit);
                    $limit_stmt->execute();
                    $limit_stmt->close();
                    
                    // Disable form if limit reached
                    if ($dec_limit == 0) {
                        $status_stmt = $conn1->prepare("UPDATE forms SET status = 0 WHERE f_id = ?");
                        if ($status_stmt) {
                            $status_stmt->bind_param("s", $form_id);
                            $status_stmt->execute();
                            $status_stmt->close();
                        }
                    }
                }
            }
            
            // Get unique user ID and redirect
            $uid_stmt = $conn1->prepare("SELECT u_id FROM form_data WHERE id = ?");
            if (!$uid_stmt) {
                throw new Exception("Database prepare error: " . $conn1->error);
            }
            
            $uid_stmt->bind_param("i", $last_rec);
            if (!$uid_stmt->execute()) {
                throw new Exception("Database execute error: " . $uid_stmt->error);
            }
            
            $uid_result = $uid_stmt->get_result();
            if ($uid_result->num_rows === 0) {
                $uid_stmt->close();
                throw new Exception("Failed to get user ID");
            }
            
            $uid_row = $uid_result->fetch_assoc();
            $uid_stmt->close();
            
            // Build redirect URL
            $refer_url = str_replace('{unique_user_id}', $uid_row['u_id'], $c_url);
            $refer_url = str_replace('{refer}', $refer_code_clean, $refer_url);
            
            // Validate URL before redirect
            if (filter_var($refer_url, FILTER_VALIDATE_URL)) {
                header('Location: ' . $refer_url);
                exit();
            } else {
                throw new Exception("Invalid redirect URL");
            }
            
        } catch (Exception $e) {
            error_log("Form submission error: " . $e->getMessage());
            echo "<script>alert('" . htmlspecialchars($e->getMessage(), ENT_QUOTES) . "');</script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<?php else: ?>
<body>
    <div class="d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Form Unavailable</h5>
                <p class="card-text">This form is currently inactive or has reached its response limit.</p>
            </div>
        </div>
    </div>
</body>
<?php endif; ?>

</html>

<?php ob_end_flush(); ?>