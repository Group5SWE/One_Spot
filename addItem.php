<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - One Spot</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div {
            margin-left: 25%;
            margin-right: 25%;
        }
        .header {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>One Spot - Add New Item</h1>
			<?php
            // Basic input sanitization
            $user_name = $_POST["user_name"];
            echo $user_name . "'s items";
            ?>
	        <nav>
            <ul>
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
    <h2 class="header">Add a new item to your inventory</h2>
    <div>
			<form method="post" action="add_conform.php" enctype="multipart/form-data">
			<?php
			echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
			?>
            <label for="itemName">Item Name:</label>
            <input type="text" style="width:100%; height:30px;" name="item_name" required>
            <br><br>

            <label for="price">Item Price:</label>
            <input type="text" style="width:100%; height:30px;" name="price" required>
            <br><br>
			
			<label for="amount">Amount:</label>
            <input type="text" style="width:100%; height:30px;" name="amount" required>
            <br><br>
			
			<label for="category">One word description:</label>
            <input type="text" style="width:100%; height:30px;" name="category" required>
            <br><br>
			
            <label for="itemPicture">Item Picture:</label>
            <input type="file" style="width:100%; height:30px;" name="itemPicture" required>
            <br><br>

            <input type="submit" value="Submit">
            
            <input type="reset" value="Reset">
			</form>

    </div>
</body>
</html>
