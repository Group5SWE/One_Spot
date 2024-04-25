<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Spot</title>
    <link rel="stylesheet" href="style.css">
	<style>
	div{
	margin-left:25%;
	margin-right:25%;
}

.welcome{
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
	<h1 class="welcome">Welcome to One Spot shopping website</h1>
	<h2 class="welcome">We have the best quality items and best price</h2>
	<br><br><br><br>
	<div>
		<?php
		$host = 'localhost'; // or your host name
		$dbname = 'iloh1'; // your database name
		$username = 'iloh1'; // your database username
		$password = 'iloh1'; // your database password
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "select user_name,password from user";
		$result = $conn->query($sql);
		echo '<h2>login:</h2>';
		echo '<form id = "form" METHOD="post" ACTION="index.php" onsubmit="return checkLogin(this)">';
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				echo '<input type="hidden" id = "'.$row["user_name"].'"value="'.$row["password"].'">';
			}
		}
		?>
		<label for="name">User Name:</label>
		<INPUT style="width:100%; height:30px;" TYPE="text" SIZE="40" MAXLENGTH="30" NAME="user_name" id="user_name" required>
		<br><br><br>
		<label for="name">Password:</label>
		<INPUT type="password" style="width:100%; height:30px;" TYPE="text" SIZE="40" MAXLENGTH="30" NAME="user_pw" id="user_pw" required>
		<br><br><br>
		<input type="submit" value="Submit"><br><br>
		<input type="reset" value="Reset">
		</form>
		<div id="error"></div>
	</div>
	<script  type="text/javascript">
        function print(elemId, hintMsg){
		document.getElementById(elemId).innerHTML = hintMsg;
	}
    function checkLogin(form){
	try {
		var user_id_num = form.user_name.value;
	var correctPassword = document.getElementById(user_id_num).value;
    var passwordCheck = form.user_pw.value;
    if(passwordCheck != correctPassword){
		print("error","Incorrect Password: Please Try again");
			return false;
    }
	} catch (error) {
		print("error","Error: No user found");
		return false;
	}

}
</script>
</body>
</html>