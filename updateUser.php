<?php
// Include the database connection code
require_once 'dbConnect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user id and updated information from the form
    $userId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    // Prepare the SQL statement to update the user in the emp table
    $sql = "UPDATE emp SET Name='$name', Email='$email', Dob='$dob' WHERE Id='$userId'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // User updated successfully
        header("Location: dashboard.php");
    } else {
        // Error occurred while updating user
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }
}

// Close the database connection
$conn->close();
?>
