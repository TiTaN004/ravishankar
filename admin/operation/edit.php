
<?php 

    include '../../backend/db/db.php';
    $id = $_GET['id'];

    $q = "select * from product where id = $id";

    $result = $conn->query($q);
    
    $row=$result->fetch_assoc();

    $name = $row['name'];
    $img_url = $row['img_url'];
    $description = $row['description'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script>
   document.addEventListener('DOMContentLoaded', function () {
       var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
       myModal.show();
   });
</script>
<!-- Favicon -->
<link rel="shortcut icon" href="../../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
      </div>
      <div class="modal-body">
      <form name="frm_pro" action="../edit_update.php" enctype="multipart/form-data" method="post">
					<div class="form-group">
                        <input type="number" name="id" id="uid" value="<?php echo $id ?>" hidden  >
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" max="100" min="1" name="txt_name" class="form-control" id="exampleInputEmail1" value="<?php echo $name ?>">
                        <label for="file">images</label>
                        <input type="file" max="100" min="1" name="file" class="form-control" id="file" value="<?php echo $img_url ?>">
                        <label for="desc ">description</label>
                        <input type="text" max="100" min="1" name="desc" class="form-control" id="desc" value="<?php echo $description ?>">
                        
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" name="btn_submit">Add
                    </button>
                    <a class="btn btn-primary btn-sm" href="../manage_category.php" name="btn_back">Back to List </a>
                    </button>
                </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php



?>