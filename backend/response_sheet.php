<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FormFusion</title>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!--extra-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Daterangepicker css -->
    <!--<link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css" type="text/css" />-->
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
        ?>

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <div style="display: flex;align-items: center;flex-wrap: nowrap;justify-content: space-between;"class="mb-1">
                            <a href="./operation/export.php"><button type="button" class="btn btn-outline-primary " name="export">Export All</button></a>
                            <button type="button" class="btn btn-outline-primary " id="toggleField4" class="btn btn-outline-secondary">Show Vendor</button>
                            <!--<div class="dropdown">-->
                            <!--    <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--        Filter by Date-->
                            <!--    </button>-->
                                
                                <!-- Dropdown Menu -->
                            <!--    <div class="dropdown-menu p-3" aria-labelledby="filterDropdown" style="min-width: 300px;">-->
                                    <!-- Date Range Filters -->
                            <!--        <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;">-->
                            <!--            <label for="startDate" class="form-label">Start Date:</label>-->
                            <!--            <input type="date" id="startDate" name="startDate" class="form-control">-->
                            <!--            <label for="endDate" class="form-label">End Date:</label>-->
                            <!--            <input type="date" id="endDate" name="endDate" class="form-control">-->
                            <!--            <button type="button" id="filterByDate" class="btn btn-primary mt-2">Search</button>-->
                            <!--        </div>-->
                            
                                    <!-- Filter Buttons -->
                            <!--        <div class="filter-buttons d-grid gap-2">-->
                            <!--            <button type="button" class="btn btn-outline-primary" data-filter="today">Today</button>-->
                            <!--            <button type="button" class="btn btn-outline-primary" data-filter="yesterday">Yesterday</button>-->
                            <!--            <button type="button" class="btn btn-outline-primary" data-filter="7days">7 Days</button>-->
                            <!--            <button type="button" class="btn btn-outline-primary" data-filter="31days">Last 31 Days</button>-->
                            <!--            <button type="button" class="btn btn-outline-primary" data-filter="1month">1 Month</button>-->
                            <!--            <button type="button" class="btn btn-outline-secondary" data-filter="clear">Clear</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!-- Dropdown Menu -->
                            <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter by Date
                            </button>
                        
                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu p-3" aria-labelledby="filterDropdown" >
                                <!-- Date Range Filters (Hidden by Default) -->
                                <div id="datePickerContainer"  style="display: none; flex-direction: column;">
                                    <label for="startDate" class="form-label me-2">Start Date:</label>
                                    <input type="date" id="startDate" name="startDate" class="form-control" style="min-width: 150px;">
                                    <label for="endDate" class="form-label me-2">End Date:</label>
                                    <input type="date" id="endDate" name="endDate" class="form-control" style="min-width: 150px;">
                                    <button type="button" id="filterByDate" class="btn btn-outline-primary mt-3 w-100">Search</button>
                                    <button type="button" id="backToFilters" class="btn btn-outline-danger mt-3 w-100">Back</button>
                                </div>
                        
                                <!-- Filter Buttons -->
                                <div id="filterButtons" class="filter-buttons" style="flex-direction: column;">
                                    <button type="button" class="btn btn-outline w-100" data-filter="today">Today</button>
                                    <button type="button" class="btn btn-outline w-100 mt-1" data-filter="yesterday">Yesterday</button>
                                    <button type="button" class="btn btn-outline w-100 mt-1" data-filter="7days">7 Days</button>
                                    <button type="button" class="btn btn-outline w-100 mt-1" data-filter="31days">Last 31 Days</button>
                                    <button type="button" class="btn btn-outline w-100 mt-1" data-filter="1month">1 Month</button>
                                    <button type="button" id="customFilter" class="btn btn-outline w-100 mt-1">Custom Filter</button>
                                    <button type="button" class="btn btn-outline-danger w-100 mt-2" data-filter="clear">Clear</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="mb-3">
                            <!--<label class="form-label">Date Range Picker With Times</label>-->
                            
                            <!--<div style="display: flex; align-items: center; margin-bottom: 10px;">-->
                            <!--    <label for="startDate" style="margin-right: 10px;">Start Date:</label>-->
                            <!--    <input type="date" id="startDate" name="startDate" class="form-control" style="margin-right: 20px;">-->
                            <!--    <label for="endDate" style="margin-right: 10px;">End Date:</label>-->
                            <!--    <input type="date" id="endDate" name="endDate" class="form-control">-->
                            <!--    <button type="button" id="filterByDate" class="btn btn-primary" style="margin-left: 20px;">Search</button>-->
                            <!--</div>-->
                            <!--<div class="filter-buttons">-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="today">Today</button>-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="yesterday">Yesterday</button>-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="7days">7 Days</button>-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="7weeks">7 Weeks</button>-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="31days">Last 31 Days</button>-->

                            <!--    <button type="button" class="btn btn-primary" data-filter="1month">1 Month</button>-->
                            <!--    <button type="button" class="btn btn-primary" data-filter="clear">Clear</button>-->
                            <!--</div>-->
                            
                            

                            <table id="datatable" class="table data-table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">UUID</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Form Name</th>
                                        <th scope="col">Refer</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Vendor Name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM form_data ORDER BY id DESC";

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
                           
                           </td>
                           </tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--extra-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/momentjs/2.29.1/moment.min.js"></script>

    <!-- Include Daterangepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        // $(document).ready(function() {
            
        //         $.fn.dataTable.moment('YYYY-MM-DD h:mm:ss A'); // Add moment.js format

        //     var table = $('#datatable').DataTable({
        //         "paging": false, // Disable pagination
        //         "searching": true, // Enable search bar
        //         "info": true, // Disable table information
        //         "ordering": true, // Enable column ordering
        //         "scrollX": true, // Enable horizontal scrolling
        //         "columnDefs": [
        //             { "targets": 7, "visible": false } // Hide the 8th column (Field 4) by default
        //         ]
        //     });




        $(document).ready(function() {
            
var table = $('#datatable').DataTable({
                dom: 'lBfrtip',
                paging: true,
                searching: true,
                ordering: false,
                info: true,
                lengthChange: true,
                pageLength: 10,
                responsive: true,
                scrollX: true,
                columnDefs: [{
                    "targets": 7,
                    "visible": false
                }], // Initially hide the 8th column (Vendor Name)
                language: {
                    lengthMenu: "Show _MENU_ entries",
                    zeroRecords: "No matching records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                },
                lengthMenu: [10, 20, 50, 100],
            });

            // Toggle the visibility of the Vendor Name column
            $('#toggleField4').on('click', function() {
                var column = table.column(7); // Select the 8th column (Vendor Name)
                column.visible(!column.visible()); // Toggle its visibility
            });



            // Date filter buttons click event
            $('.filter-buttons button').click(function() {
                var filter = $(this).data('filter');
                var startDate, endDate;

                switch (filter) {
                    case 'today':
                        startDate = moment().startOf('day');
                        endDate = moment().endOf('day');
                        break;
                    case 'yesterday':
                        startDate = moment().subtract(1, 'days').startOf('day');
                        endDate = moment().subtract(1, 'days').endOf('day');
                        break;
                    case '7days':
                        startDate = moment().subtract(7, 'days').startOf('day');
                        endDate = moment().endOf('day');
                        break;
                    case '31days':
                        startDate = moment().subtract(31, 'days').startOf('day');
                        endDate = moment().endOf('day');
                        break;
                    case '1month':
                        startDate = moment().subtract(1, 'months').startOf('month');
                        endDate = moment().subtract(1, 'months').endOf('month');
                        break;
                    case 'clear':
                        table.draw(); // Redraw table without filtering
                        return;
                    default:
                        return;
                }

                // Apply date range filter
                applyDateFilter(startDate, endDate);
            });

            // Custom date range filter
            $('#filterByDate').click(function() {
                var startDate = moment($('#startDate').val()).startOf('day');
                var endDate = moment($('#endDate').val()).endOf('day');

                if (startDate.isValid() && endDate.isValid()) {
                    applyDateFilter(startDate, endDate);
                }
            });

            function applyDateFilter(startDate, endDate) {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var date = moment(data[1], 'YYYY-MM-DD HH:mm:ss'); // Adjust the date format as per your data format
                        if (date.isSameOrAfter(startDate) && date.isSameOrBefore(endDate)) {
                            return true;
                        }
                        return false;
                    }
                );
                table.draw();
                $.fn.dataTable.ext.search.pop(); // Remove the filter to prevent stacking
            }
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            // JavaScript to toggle visibility
            document.getElementById('customFilter').addEventListener('click', function() {
                // Hide filter buttons and show date pickers
                document.getElementById('filterButtons').style.display = 'none';
                document.getElementById('datePickerContainer').style.display = 'flex';
            });

            document.getElementById('backToFilters').addEventListener('click', function() {
                // Show filter buttons and hide date pickers
                document.getElementById('filterButtons').style.display = 'flex';
                document.getElementById('datePickerContainer').style.display = 'none';
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
    <!--<script src="assets/vendor/daterangepicker/moment.min.js"></script>-->
    <!--<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>-->

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