<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
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
    <h1>Add User</h1>

    <form method="POST" action="saveUser.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <button type="submit">Submit</button>
    </form>

    <div class="back-button">
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
