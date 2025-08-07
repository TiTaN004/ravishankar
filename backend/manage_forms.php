<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>FormFusion</title>

    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


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
    <div class="mb-1">
        
        <table id="datatable" class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Form ID</th>
      <th>Created At</th>
      <th>Title</th>
      <th>Redirect URL</th>
      <th>Response Limit</th>
      <th>Status</th>
      <th style="text-align: center !important;">Actions</th>
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
                            }
                            // else if($row['status'] == 1 && $row['res_limit'] == 0){
                            //     $status = "<span class='mt-2 badge border border-danger text-danger mt-2'>Inactive</span>";
                            // }
                          
                                else{
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
                           <td>" . $row['created_at'] . "</td>
                           <td>" . $row['title'] . "</td>
                           <td>" . $new_url . "</td>
                           <td>" . $indicator . "</td>
                           <td>" . $status . "</td>
                           <td style='display: flex;
                            flex-wrap: nowrap;
                            flex-direction: row;
                            justify-content: center;
                            align-items: center; align = 'center'>
                            <a href='./operation/edit.php?id=" . $row['f_id'] . "'><i class='fa-solid fa-pen-to-square pr-3' style='color: black !important;'></i></a>
                           <a href='./operation/delete.php?id=" . $row['f_id'] . "'onclick=\"return confirm('Are you sure you want to delete this item?');\"><i class='fa-solid fa-trash pr-3' style='color: black !important;'></i></a>
                           <a href='./operation/view.php?id=" . $row['f_id'] . "'><i class='fa-solid fa-eye' style='color: black !important;'></i></a>
                           </td>
                           </tr>";
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
   
   
   

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<?php include './component/footer.php'; ?>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>

<script src="../assets/js/backend-bundle.min.js"></script>
<script src="../assets/js/customizer.js"></script>
<script src="../assets/js/sidebar.js"></script>

<script src="https://kit.fontawesome.com/56dc9e1c6b.js" crossorigin="anonymous"></script>
<script src="../assets/js/app.js"></script>


   <script>
   
$(document).ready(function() {
 
    // Initialize DataTables if not already initialized
    table = $('#datatable').DataTable({
      dom: 'Bfrtip',
    paging: false,
    searching: true,
    ordering: true,
    info: true,
    lengthChange: true,
    responsive: true,
    language: {
      lengthMenu: "Show _MENU_ entries",
      zeroRecords: "No matching records found",
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      infoEmpty: "Showing 0 to 0 of 0 entries",
      infoFiltered: "(filtered from _MAX_ total entries)"
    }
    });
  

  $('.filter-buttons button').click(function() {
    var filter = $(this).data('filter');
    var startDate, endDate;

    switch (filter) {
      case 'today':
        startDate = new Date();
        endDate = startDate;
        break;
      case 'yesterday':
        var yesterdayTimestamp = new Date().setDate(new Date().getDate() - 1);
        startDate = new Date(yesterdayTimestamp);
        endDate = startDate;
        break;
      case '1week':
        var oneWeekAgoTimestamp = new Date().setDate(new Date().getDate() - 7);
        startDate = new Date(oneWeekAgoTimestamp);
        endDate = new Date();
        break;
      case '7weeks':
        var sevenWeeksAgoTimestamp = new Date().setDate(new Date().getDate() - 7 * 7);
        startDate = new Date(sevenWeeksAgoTimestamp);
        endDate = new Date();
        break;
      case '1month':
      var firstDayOfCurrentMonth = new Date(new Date().getFullYear(), new Date().getMonth(), 1);
      startDate = new Date(firstDayOfCurrentMonth.setMonth(firstDayOfCurrentMonth.getMonth() - 1));
      endDate = new Date(startDate.getFullYear(), startDate.getMonth() + 1, 0);
      break;
      case 'clear':
        startDate = null;
      endDate = null;
      table.columns(2).search('').draw();
      default:
        return;
    }
    
    // Format the start and end dates as strings in the desired format
    var formattedStartDate = startDate.toISOString().split('T')[0] + ' 00:00:00';
    var formattedEndDate = endDate.toISOString().split('T')[0] + ' 23:59:59';

    console.log(startDate.toISOString().split('T')[0]);
console.log(endDate.toISOString().split('T')[0]);

    table.columns(2).search({
      search: {
        regex: true,
        gte: formattedStartDate,
        lte: formattedEndDate
      }
    }).draw();
  });
});




</script>




   
</body>

</html>