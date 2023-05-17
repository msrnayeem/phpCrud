<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: cyan;
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

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        <div id="error" class="error"></div>

        <form id="loginForm" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        // Function to handle the form submission
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the callback function for handling the AJAX response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) { // Request is complete
                    if (xhr.status === 200) { // Request was successful
                        var response = xhr.responseText;
                        var jsonResponse = JSON.parse(response); // Parse the JSON response

                        if (jsonResponse.status === 'success') {
                            window.location.replace('dashboard.php');
                        } else {
                            console.log("Error:", jsonResponse);
                            // Display the error message
                            document.getElementById('error').innerHTML = jsonResponse.message;
                        }
                    } else {
                        // Request failed, display an error message
                        document.getElementById('error').innerHTML = 'An error occurred during login. Please try again.';
                    }
                }
            };

            // Prepare and send the AJAX request
            xhr.open('POST', 'loginCheck.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
        });
    </script>
</body>


</html>