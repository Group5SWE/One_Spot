
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
		$item_id=$_POST["item_id"];
		$item_name=$_POST["item_name"];
		$price=$_POST["price"];
		$category=$_POST["category"];
		$amount=$_POST["amount"];
		
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
	<h1>current status:</h1><br>
	<?php
		echo "Item name: " . $item_name . "<br>";
		echo "Item price: " . $price . "<br>";
		echo "Item amount: " . $amount . "<br>";
		
		$host = "localhost";
		$user = "iloh1";
		$pass = "iloh1";
		$dbname = "iloh1";

		$conn = new mysqli($host, $user, $pass, $dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		
		$upload = 'UPDATE items SET item_name ="' . $item_name . '", amount =' . $amount . ' , price =' . $price . ' WHERE item_id =' . $item_id;
		$result = $conn->query($upload);
		
		echo '<br>';
		echo '<form action="EditMyItem.php" method="post">';
		echo '<input type="hidden" name="item_name" value="' . $item_name . '">';
		echo '<input type="hidden" name="item_id" value="' . $item_id . '">';
		echo '<input type="hidden" name="price" value="' . $price . '">';
		echo '<input type="hidden" name="category" value="' . $category . '">';
		echo '<input type="hidden" name="amount" value="' . $amount . '">';
		echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
	?>

		<div>
            <label for="item_name">New Item name:</label>
            <input type="text" id="item_name" name="item_name" required>
        </div>
		<div>
            <label for="price">New price:</label>
            <input type="text" id="price" name="price" required>
        </div>
		<div>
            <label for="amount">New amount:</label>
            <input type="text" id="amount" name="amount" required>
        </div>
		<div>
            <button type="submit">Submit Payment</button>
        </div>
	</form>
    </section>
    <footer>
        <p>One Spot</p>
    </footer>
</body>
</html>
