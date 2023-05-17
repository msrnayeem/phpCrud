<?php
// Include the database connection code
require_once 'dbConnect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's name, email, and date of birth from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];

    // Prepare the SQL statement to insert the user into the emp table
    $sql = "INSERT INTO emp (Name, Email, Dob) VALUES ('$name', '$email', '$dob')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // User inserted successfully
        header("Location: dashboard.php");
    } else {
        // Error occurred while inserting user
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }
}

// Close the database connection
$conn->close();
?>
