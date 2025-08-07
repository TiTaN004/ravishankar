<?php
error_reporting(-1);
ini_set('display_errors', 1);
$id = $_GET['id'];
    include '../db/formdb.php';
    if(isset($_GET['id']))
    $sql = "SELECT * FROM form_data where f_id = '$id'";
    
    else
    $sql = "SELECT * FROM form_data";
    
    $result = $conn1->query($sql);
    

    // Check if there are any results
if ($result->num_rows > 0) {
    // Fetch the first row to define the CSV file name
    $firstRow = $result->fetch_assoc();
    
    // Define the CSV file name based on the first row's data
    if (isset($_GET['id'])) {
        // Use the form title from the first row
        $csvFileName = $firstRow['form_title'] . ".csv";
    } else {
        $csvFileName = 'record.csv';
    }

    // Open the CSV file for writing
    $csvFile = fopen($csvFileName, 'w');

    // Fetch the column names from the first row and write them to the CSV file
    $columnNames = array_keys($firstRow);
    fputcsv($csvFile, $columnNames);

    // Write the first row to the CSV file
    fputcsv($csvFile, $firstRow);

    // Write the remaining rows to the CSV file
    while ($row = $result->fetch_assoc()) {
        fputcsv($csvFile, $row);
    }

    // Close the CSV file
    fclose($csvFile);

    // Provide the CSV file for download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

    // Output the file to the browser
    readfile($csvFileName);

    // Delete the file after download to clean up
    unlink($csvFileName);
    exit;  // Stop further execution after the file download
} else {
    echo "No records found in the database.";
}
?>