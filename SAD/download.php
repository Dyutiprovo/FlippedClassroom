<?php
include 'partials/_dbconnect.php'; // ensure you have your database connection file correctly referenced

// Check if the file identifier is present in the GET request
if(isset($_GET['FileNo'])) {
    $fileId = $_GET['FileNo'];
    $query = "SELECT material_path FROM materials WHERE material_name = ?"; // Assuming 'material_id' or similar as your identifier

    // Prepare and execute the statement to avoid SQL injection
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $fileId);
        $stmt->execute();
        $stmt->bind_result($filePath);
        $stmt->fetch();
        $stmt->close();

        // Check if file exists and then initiate download
        if(file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            flush(); // Flush system output buffer
            readfile($filePath);
            exit;
        }
    }
    echo "Error: File not found.";
} else {
    echo "Error: No file specified.";
}
?>