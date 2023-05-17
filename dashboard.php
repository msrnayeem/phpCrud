<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
         table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container button {
            padding: 8px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h1>Dashboard</h1>

<?php
// Include the database connection code
require_once 'dbConnect.php';

// Retrieve the users from the database
$sql = "SELECT * FROM emp";
$result = $conn->query($sql);
?>
<div class="button-container">
    <button onclick="location.href='addUser.php'">Add New User</button>
</div>
<br>
<br>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><a href="editUser.php?id=<?php echo $row['Id']; ?>">Edit</a></td>
            <td><a href="deleteUser.php?id=<?php echo $row['Id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
        
        </tr>
    <?php endwhile; ?>
</table>



</body>
</html>
