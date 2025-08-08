 <?php error_reporting(-1);
 ini_set('display_errors',1);
 ?>

 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FormFusion</title>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
    
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0em 0em;
    margin-left: 0px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: inherit !important;
    border: 0px solid transparent;
    border-radius: 2px;
    background: transparent;
}
    </style>
    
</head>

<body class=" color-light ">

    <div class="wrapper">

        <?php include './component/nav.php';
        include './component/sidebar.php';
        include './db/formdb.php';
        $form_id = $_GET['id'];
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $resultsPerPage = 10;
        $offset = ($page - 1) * $resultsPerPage;

        $q = "SELECT * FROM form_data where f_id = '$form_id'";

        $result = $conn1->query($q);

        $rows = $result->num_rows;

        $x = ceil(($rows / $resultsPerPage));

        ?>

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <div style="
                  display: flex;
                  align-items: center;
                  flex-wrap: nowrap;
                  justify-content: space-between;
               "
                            class="mb-1">
                            <a href="./operation/export.php?id=<?php echo $form_id  ?>"><button type="button" class="btn btn-outline-primary " name="export">Export All</button></a>
                         <button type="button"  class="btn btn-outline-primary " id="toggleField4" class="btn btn-outline-secondary">Show Vendor</button>

                        </div>
                        <?php

                        ?>
                        <!-- Date Range Picker With Times -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Date Range Picker With Times</label>
                            <input type="text" class="form-control date" id="daterangetime" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">
                        </div> -->
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead class="thead-dark ">
                                <tr class="w-full">
                                    <th scope="col">UUID</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Form Name</th>
                                    <th scope="col">Refer</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Vendor Name</th>
                                    <th scope="col">Field 5</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM form_data where f_id = '$form_id' ORDER BY id DESC";

                                $result = $conn1->query($sql);

                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr>
                           <td>" . $row['u_id'] . "</td>
                           <td>" . $row['created_at'] . "</td>
                           <td>" . $row['form_title'] . "</td>
                           <td>" . $row['refer_num'] . "</td>
                           <td>" . $row['field_1'] . "</td>
                           <td>" . $row['field_2'] . "</td>
                           <td>" . $row['field_3'] . "</td>
                           <td>" . $row['field_4'] . "</td>
                           <td>" . $row['field_5'] . "</td>
                           
                           </td>
                           </tr>";
                                }
                                ?>


                            </tbody>
                        </table>

                        <nav aria-label='Page navigation example'>
                            <ul class='pagination'>
                                <?php
                        //         for ($i = 1; $i <= $x; $i++) {
                        //             echo "
                        //   <li class='page-item'><a class='page-link border-primary bg-primary text-white' href='?page=$i'>$i</a></li>
                        // ";
                        //         }
                                ?></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    


    <script>
$(document).ready(function() {
    var table = $('#datatable').DataTable({
        "paging": true, // Disable pagination
        "searching": true, // Enable search bar
        "info": false, // Disable table information
        "ordering": false, // Enable column ordering
        "scrollX": true, // Enable horizontal scrolling
        "columnDefs": [
            { "targets": 7, "visible": false } // Hide the 8th column (Field 4) by default
        ]
    });

    $('#toggleField4').click(function() {
        var column = table.column(7); 
        column.visible(!column.visible()); // Toggle visibility of the 8th column (Field 4)
    });
});

    </script>

    <!-- ----------------- -->

    <!-- Wrapper End-->
    <?php include './component/footer.php'; ?>
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>

    <script src="../assets/js/sidebar.js"></script>

    <!-- Daterangepicker js -->
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

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


    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
</body>

</html>