<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Successful - One Spot</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div, .message-container {
            margin-left: 25%;
            margin-right: 25%;
        }
        .center {
            text-align: center;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>One Spot</h1>
        <nav>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="Register.html">Register</a></li>
            </ul>
        </nav>
    </header>
	<?php
		$user_name = $_POST["username"];
		$user_pass = $_POST["password"];
		$host = 'localhost'; // or your host name
		$dbname = 'iloh1'; // your database name
		$username = 'iloh1'; // your database username
		$password = 'iloh1'; // your database password
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "insert into user (user_name,password) values ('" . $user_name . "','" . $user_pass . "')";
		$result = $conn->query($sql);
	?>
    <div class="message-container">
        <h1 class="center">Register Successful</h1>
        <button class="button" onclick="window.location.href='login.php';">Back to Login</button>
    </div>
</body>
</html>
