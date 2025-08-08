<?php  include './component/nav.php';  include './component/sidebar.php';
    error_reporting(-1);
   include './db/db.php';
   include './db/formdb.php';

    $q = "SELECT COUNT(*) as total FROM form_data WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m');";

    $result = $conn1->query($q);
    $this_month = "";
    if($result){
         $row = $result->fetch_assoc();
         $this_month = $row['total'];
    }else{
        $this_month = "error fetching";
    }
    
    $q = "SELECT COUNT(*) as total FROM form_data";

    $result = $conn1->query($q);
    $total_lead = "";
    if($result){
         $row = $result->fetch_assoc();
         $total_lead = $row['total'];
    }else{
        $total_lead = "error fetching";
    }
    
    $q = "SELECT COUNT(*) AS total FROM form_data WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, '%Y-%m');";
    
    $result = $conn1->query($q);
    $last_month = "";
    if($result){
         $row = $result->fetch_assoc();
         $last_month = $row['total'];
    }else{
        $last_month = "error fetching";
    }
?>
 
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>FormFusion</title>
      
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
   </head>
  <body class="  ">
    
       
      <div class="content-page">
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12 mb-4 mt-1">
         <div class="d-flex flex-wrap justify-content-between align-items-center">
             <h4 class="font-weight-bold">Overview</h4>
         </div>
      </div>
      <div class="col-lg-12 col-md-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-secondary">Lead Last Month</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">
                                   <?php echo $last_month ?>
                                   </h5>
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-2 text-secondary">Lead Current Month</p>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                               <h5 class="mb-0 font-weight-bold">
                                   <?php echo $this_month ?>
                                   </h5>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>   
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-2 text-secondary">Total Leads</p>
                           <div class="d-flex flex-wrap justify-content-start align-items-center">
                              <h5 class="mb-0 font-weight-bold">
                                  <?php echo $total_lead ?>
                                  </h5>
                           </div>                            
                        </div>
                    </div>
                </div>
            </div>   
            </div>
      
      
      <?php 
    //   $offset = 0;
    //   $resultsPerPage = 4;
    //       $sql = "SELECT * FROM lead WHERE status = 'inquiry' LIMIT $offset, $resultsPerPage";
           
    //       $result = $conn->query($sql);
   
    //       while($row = $result->fetch_assoc()){
    //           echo "<tr>
    //           <th scope='row'>".$row['id']."</th>
    //           <td>".$row['fname']."</td>
    //           <td>".$row['lname']."</td>
    //           <td>".$row['email']."</td>
    //           <td>".$row['phone']."</td>
    //           <!--<td>".$row['state']."</td>
    //           <td>".$row['source']."</td>
    //           <td>".$row['Inquiry']."</td>
    //           <td>".$row['status']."</td>
    //           <td><a href='./operation/edit.php?id=".$row['id']."'><button type='button' class='btn btn-primary rounded-pill mt-2'>Edit</button></a>
    //           <a href='./operation/delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger rounded-pill mt-2'>Delete</button></a>
    //           </td>-->
    //         </tr>";
    //       }
         ?>
                  
               </div>
            </div>
         </div>
      </div>
    <!-- Page end  -->
</div>
      </div>
    </div>
    <!-- Wrapper End-->
    <?php include './component/footer.php'; ?>   <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <script src="../assets/js/sidebar.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="../assets/js/flex-tree.min.js"></script>
    <script src="../assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="../assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="../assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    <script src="../assets/js/charts/01.js"></script>
    <script src="../assets/js/charts/02.js"></script>
    
    <!-- slider JavaScript -->
    <script src="../assets/js/slider.js"></script>
    
    <!-- Emoji picker -->
    <script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>  </body>
</html>