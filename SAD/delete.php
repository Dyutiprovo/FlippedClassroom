<?php
session_start(); // Ensure session is started
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect subject_uid and material_name from POST
    $subject_uid = $_POST['subject_uid'];
    $material_name = $_POST['material_name'];

    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "fc_new";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement to delete the file
    $sql = "DELETE FROM materials WHERE material_name = ? AND sub_uid = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("si", $material_name, $subject_uid);

    // Execute the statement
    if ($stmt->execute()) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
