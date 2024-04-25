
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
		<p class="username">
		<?php
		$user_name = $_POST["user_name"];
		$item_name=$_POST["item_name"];
		$price=$_POST["price"];
		$amount=$_POST["amount"];
		$category=$_POST["category"];		
        echo $user_name . "'s items";
		?>
		</p >
        <nav>
            <ul>
				<li>
				<form id="form" method="post" action="addItem.php">
				<input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
				<button type="submit">Add items</button>
				</form>
				</li>
                <li>
				<form id="form" method="post" action="DeleteMyItem.php">
				<input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
				<button type="submit">Delete</button>
				</form>
				</li>

            </ul>
        </nav>
		<form id="form" method="post" action="index.php">
            <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
            <button type="submit" class="right-button">Back to Homepage</button>
        </form>
    </header>
    <section class="products">
	<h1>Add successful</h1>
	<?php
		$host = "localhost";
		$user = "iloh1";
		$pass = "iloh1";
		$dbname = "iloh1";

		$conn = new mysqli($host, $user, $pass, $dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		
		$add = 'INSERT INTO items (item_name, price, amount, category, user_name, item_status) VALUES ("' . $item_name . '",' . $price . ',' . $amount . ',"' . $category . '","' . $user_name . '",1)'; 
		$result = $conn->query($add);
	?>

    </section>
    <footer>
        <p>One Spot</p>
    </footer>
</body>
</html>
