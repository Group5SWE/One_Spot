<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Spot</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .username {
            text-align: right;
        }
    </style>
</head>
<body>
    <header>
        <h1>One Spot</h1>
        <p class="username">
            <?php
            // Basic input sanitization
            $user_name = $_POST["user_name"];
            echo $user_name . "'s items";
            ?>
        </p>
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
				<button type="submit">Delete items</button>
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
        $sql = 'SELECT * FROM items WHERE user_name ="' . $user_name . '"';
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
				echo '<article class="product">';
				echo '<img src="' . $row["item_id"] . '.png" alt="Product Image">';
				echo '<h2>' . $row["item_name"] . '</h2>';
				echo '<p>' . $row["price"] . '$</p>';
				echo '<form id = "form" METHOD="post" ACTION="EditMyItem.php">';
				echo '<input type="hidden" name="item_name" value="' . $row["item_name"] . '">';
				echo '<input type="hidden" name="item_id" value="' . $row["item_id"] . '">';
				echo '<input type="hidden" name="price" value="' . $row["price"] . '">';
				echo '<input type="hidden" name="category" value="' . $row["category"] . '">';
				echo '<input type="hidden" name="amount" value="' . $row["amount"] . '">';
				echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
				echo '<button type="submit">edit</button>';
				echo '</form>';
                echo '</article>';
            }
        } else {
            echo '<p>No items found.</p>';
        }
        ?>
		<br><br>
    </section>
    <footer>
        <p>One Spot</p>
    </footer>
</body>
</html>
