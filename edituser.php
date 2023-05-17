<?php
// Include the database connection code
require_once 'dbConnect.php';
$Name = '';
$Email = '';
$Dob = '';

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the user id from the URL parameter
    $userId = $_GET['id'];

    // Prepare the SQL statement to select the user from the emp table
    $sql = "SELECT * FROM emp WHERE Id = '$userId'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $user = $result->fetch_assoc();
        $Name = $user['Name'];
        $Email = $user['Email'];
        $Dob = $user['Dob'];
    } else {
        // User does not exist
        echo "User not found.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            padding: 20px;
            background: #f1f1f1;
            border-radius: 5px;
        }

        .container h1 {
            text-align: center;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container label {
            margin-bottom: 10px;
        }

        .container input {
            padding: 5px;
            margin-bottom: 10px;
        }

        .container button {
            padding: 8px;
        }

        .back-button {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit User</h1>

    <form method="POST" action="updateUser.php">
        <input type="hidden" name="id" value="<?php echo $userId; ?>">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $Name; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $Email; ?>" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $Dob; ?>" required>

        <button type="submit">Update</button>
    </form>

    <div class="back-button">
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
