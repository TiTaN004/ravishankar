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