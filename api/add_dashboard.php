<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../backend/db/db.php';
include '../backend/db/formdb.php';

// Get 'forms_id' from the GET request
$forms_id = isset($_GET['forms_id']) ? intval($_GET['forms_id']) : null;

if ($forms_id === null) {
    die("Error: forms_id parameter is missing.");
}

// Path to the .sql file
$sql_file = '../schema/forms.sql';

// Read the SQL file
$sql = file_get_contents($sql_file);

// Replace all occurrences of 'forms_id' in the SQL file with the provided forms_id from GET
$sql = str_replace('forms_id', 'forms_'.$forms_id, $sql);

// Execute the SQL (for multiple statements, use multi_query)
if ($conn1->multi_query($sql)) {
    do {
        // Proceed to the next result (if any)
    } while ($conn1->next_result());

    echo "forms table is created for the user";
} else {
    echo "Error: " . $conn->error;
}


// Path to the .sql file
$sql_file = '../schema/form_data.sql';

// Read the SQL file
$sql = file_get_contents($sql_file);

// Replace all occurrences of 'forms_id' in the SQL file with the provided forms_id from GET
$sql = str_replace('name', 'form_data_'.$forms_id, $sql);

// Execute the SQL (for multiple statements, use multi_query)
if ($conn1->multi_query($sql)) {
    do {
        // Proceed to the next result (if any)
    } while ($conn1->next_result());

    echo "form_data table is created for the user";
} else {
    echo "Error: " . $conn->error;
}

?>