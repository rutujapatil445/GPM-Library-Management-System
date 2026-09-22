<?php

// Include PhpSpreadsheet library (assuming it's installed via Composer)
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['importBtn'])) {
    // Check if a file was uploaded
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
        $file_tmp = $_FILES['excelFile']['tmp_name'];

        // Specify your database connection details
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "library";

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Load the Excel file
        $spreadsheet = IOFactory::load($file_tmp);
        $worksheet = $spreadsheet->getActiveSheet();
        $lastRow = $worksheet->getHighestRow();

        // Loop through each row in the Excel file
        for ($row = 2; $row <= $lastRow; $row++) {
            // Assuming your Excel columns are in A, B, C, etc.
            $colA = $worksheet->getCell('A' . $row)->getValue();
            $colB = $worksheet->getCell('B' . $row)->getValue();   
            $colC = $worksheet->getCell('B' . $row)->getValue();
            $colD = $worksheet->getCell('B' . $row)->getValue();
            $colE = $worksheet->getCell('B' . $row)->getValue();
            $colF = $worksheet->getCell('B' . $row)->getValue();
            $colG = $worksheet->getCell('B' . $row)->getValue();
            $colH = $worksheet->getCell('B' . $row)->getValue();


            // Add more columns as needed

            // Insert data into the database
            $sql = "INSERT INTO `books` VALUES ('$colA', '$colB','$colC','$colD','$colE','$colF','$colG','$colH')";
            $conn->query($sql);
        }

        // Close the database connection
        $conn->close();

        echo "Data imported successfully!";
    } else {
        echo "Error uploading the file.";
    }
}
?>
