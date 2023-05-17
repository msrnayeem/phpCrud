<?php
// Include the database connection code
require_once 'dbConnect.php';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the user id from the URL parameter
    $userId = $_GET['id'];

    // Prepare the SQL statement to delete the user from the emp table
    $sql = "DELETE FROM emp WHERE Id = '$userId'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // User deleted successfully
        header("Location: dashboard.php");
    } else {
        // Error occurred while deleting user
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }
}

// Close the database connection
$conn->close();
?>
