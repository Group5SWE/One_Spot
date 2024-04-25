<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - One Spot</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div {
            margin-left: 25%;
            margin-right: 25%;
        }
        .welcome {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>One Spot</h1>
		<nav>
            <ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="Register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <h1 class="welcome">Register for One Spot</h1>
    <h2 class="welcome">Start your shopping experience with us</h2>
    <br><br><br><br>
    <div>
        <h2>Register:</h2>
        <form method="post" action="Register_Successful.php">
            <label for="username">User Name:</label>
            <input style="width:100%; height:30px;" type="text" size="40" maxlength="30" name="username" id="username" required>
            <br><br><br>
            <label for="password">Password:</label>
            <input style="width:100%; height:30px;" type="password" size="40" maxlength="30" name="password" id="password" required>
            <br><br><br>
            <input type="submit" value="Submit"><br><br>
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>
