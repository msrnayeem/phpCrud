<?php
// Include the database connection code
require_once 'dbConnect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's email and password from the form
    
    // Query the users table
    $sql = "SELECT * FROM users WHERE Email='".$_POST["email"]."' AND Password='".$_POST["password"]."'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $user = $result->fetch_assoc();
        $response = array('status' => 'success');
       

    } else {
        // User does not exist
       
        $response = array('status' => 'error', 'message' => 'Invalid email or password.');

    }
    header('Content-Type: application/json');
echo json_encode($response);
exit();
}
?>