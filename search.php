<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Spot</title>
    <link rel="stylesheet" href="style.css">
	<style>
		.username{
			text-align: right;
			}
	</style>
</head>
<body>
    <header>
        <h1>One Spot</h1>
		<h1>
		<?php
			$user_name = $_POST["user_name"];
			echo "Welcome " . $user_name;
		$host = 'localhost'; // or your host name
		$dbname = 'iloh1'; // your database name
		$username = 'iloh1'; // your database username
		$password = 'iloh1'; // your database password
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		?>
		</h1>
		<p class="username">
		
		</p>
		<form id = "form" METHOD="post" ACTION="index.php">
		<?php 
			echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
			echo '<button type="submit" class="right-button">Back to homepage</button>';
		?>
		</form>
	
    </header>
    <section class="products">
		<?php
		$name = $_POST["name"];
		$sql = 'select * from items where item_name like "%' . $name . '%"';
		$result2 = $conn->query($sql);
		if($result2->num_rows>0){
			while($row = $result2->fetch_assoc()){
				echo '<article class="product">';
				echo '<img src="' . $row["item_id"] . '.png" alt="Product Image">';
				echo '<h2>' . $row["item_name"] . '</h2>';
				echo '<p>' . $row["price"] . '$</p>';
				echo '<form id = "form" METHOD="post" ACTION="payment.php">';
				echo '<input type="hidden" name="item_id" value="' . $row["item_id"] . '">';
				echo '<input type="hidden" name="price" value="' . $row["price"] . '">';
				echo '<input type="hidden" name="category" value="' . $row["category"] . '">';
				echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
				echo '<button type="submit">buy now</button>';
				echo '</form>';
				echo '</article>';
			}
		}
		?>
    </section>
    <footer>
        <p>One Spot</p>
    </footer>
</body>
</html>
