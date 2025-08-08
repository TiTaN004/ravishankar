<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>FormFusion</title>

   
   
   <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">

   <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
   <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
</head>

<body class=" color-light ">
   <!-- loader Start -->
   <!-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> -->
   <!-- loader END -->
   <!-- Wrapper Start -->

   <div class="wrapper">

      <?php include './component/nav.php';
      include './component/sidebar.php';
      include './db/formdb.php';

      if (!isset($_GET['page'])) {
         $page = 1;
      } else {
         $page = $_GET['page'];
      }
      $resultsPerPage = 10;
      $offset = ($page - 1) * $resultsPerPage;

      $q = "SELECT * FROM forms";

      $result = $conn1->query($q);

      $rows = $result->num_rows;

      $x = ceil(($rows / $resultsPerPage));

      ?>

      <div class="content-page">
         <div class="container-fluid">
            <div class="row">

               <div class="col-lg-12">
               <!--   <div style="-->
               <!--   display: flex;-->
               <!--   align-items: center;-->
               <!--   flex-wrap: nowrap;-->
               <!--   justify-content: space-between;-->
               <!--"-->
               <!--      class="mb-1">-->
               <!--      <a href="./operation/export.php"><button type="button" class="btn btn-outline-primary " name="export">Export All</button></a>-->
                     

               <!--   </div>-->
                  <table  id="datatable" class="table table-striped table-bordered">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">Form id</th>
                           <th scope="col">Title</th>
                           <th scope="col" >Status</th>
                           <th scope="col" style = "text-align : center !important;">View</th>
                           
                        </tr>
                     </thead>
                     <tbody>

                        <?php
                        $sql = "SELECT * FROM forms LIMIT $offset, $resultsPerPage";
                        
                        $result = $conn1->query($sql);
                        
                        $new_url;
                        
                        while ($row = $result->fetch_assoc()) {
                            
                            $status;
                            if($row['status'] == 1){
                                $status = "<span class='mt-2 badge border border-success text-success mt-2'>Active</span>";
                            }else{
                                $status = "<span class='mt-2 badge border border-danger text-danger mt-2'>Inactive</span>";
                            }
                
                           if(strlen($row['c_url']) > 50){
                              $new_url = substr($row['c_url'], 0, 40);
                              $post_str = "...";
                              $new_url = $new_url . $post_str;
                           }else{
                              $new_url = $row['c_url'];
                           }
                           
                           $indicator = ($row['res_limit'] == null) ? "-" : $row['res_limit'];

                           echo "<tr>
                           <td>" . $row['f_id'] . "</td>
                           <td>" . $row['title'] . "</td>
                           <td>" . $status . "</td>
                           <td style='display: flex;
                            flex-wrap: nowrap;
                            flex-direction: row;
                            justify-content: center;
                            align-items: center; align = 'center'>
                           <a href='./form_data.php?id=" . $row['f_id'] . "'><i class='fa-solid fa-eye' style='color: black !important;'></i></a>
                           </td></tr>";
                        }
                        ?>


                     </tbody>
                  </table>
                  <nav aria-label='Page navigation example'>
                     <ul class='pagination'>
                        <?php
                        for ($i = 1; $i <= $x; $i++) {
                           echo "
                           <li class='page-item'><a class='page-link border-primary bg-primary text-white' href='?page=$i'>$i</a></li>
                        ";
                        }
                        ?></ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   
   <!-- jQuery (necessary for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons JavaScript -->
<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>

   <!-- Wrapper End-->
   <?php include './component/footer.php'; ?>
   <!-- Backend Bundle JavaScript -->
   <script src="../assets/js/backend-bundle.min.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="../assets/js/customizer.js"></script>

   <script src="../assets/js/sidebar.js"></script>

   <!-- Flextree Javascript-->
   <!-- <script src="../assets/js/flex-tree.min.js"></script>
   <script src="../assets/js/tree.js"></script> -->

   <!-- Table Treeview JavaScript -->
   <!-- <script src="../assets/js/table-treeview.js"></script> -->

   <!-- SweetAlert JavaScript -->
   <!-- <script src="../assets/js/sweetalert.js"></script> -->

   <!-- Vectoe Map JavaScript -->
   <!-- <script src="../assets/js/vector-map-custom.js"></script> -->

   <!-- Chart Custom JavaScript -->
   <!-- <script src="../assets/js/chart-custom.js"></script>
   <script src="../assets/js/charts/01.js"></script>
   <script src="../assets/js/charts/02.js"></script> -->

   <!-- slider JavaScript -->
   <script src="../assets/js/slider.js"></script>

   <!-- Emoji picker -->
   <!-- <script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script> -->

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/56dc9e1c6b.js" crossorigin="anonymous"></script>
   <!-- app JavaScript -->
   <script src="../assets/js/app.js"></script>
   <script>
 $(document).ready(function() {
  $('#datatable').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excelHtml5',
        text: 'Export All',
        className: 'btn btn-outline-primary'
      },
      {
        extend: 'pdfHtml5',
        text: 'Export as PDF',
        className: 'btn btn-outline-success'
      },
      {
        extend: 'print',
        text: 'Print',
        className: 'btn btn-outline-dark'
      }
    ],
    paging: false,
    searching: true,
    ordering: true,
    info: true,
    lengthChange: true,
    pageLength: 10,
    responsive: true,
    language: {
      lengthMenu: "Show _MENU_ entries",
      zeroRecords: "No matching records found",
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      infoEmpty: "Showing 0 to 0 of 0 entries",
      infoFiltered: "(filtered from _MAX_ total entries)"
    }
  });
});
</script>
</body>

</html>