<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - One Spot</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
	<?php
		$user_name=$_POST["user_name"];
	?>
		<form id="form" method="post" action="index.php">
            <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
            <button type="submit" class="right-button">Back to Homepage</button>
        </form>
</head>
<body>
    <header>
        <h1>Payment Information</h1>
    </header>
    <div class="container">
        <form action="process_payment.php" method="post">
		<?php
		$item_id=$_POST["item_id"];
		$price=$_POST["price"];
		$category=$_POST["category"];
		echo '<input type="hidden" name="item_id" value="' . $item_id . '">';
		echo '<input type="hidden" name="price" value="' . $price . '">';
		echo '<input type="hidden" name="category" value="' . $category . '">';
		echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
		?>
            <div>
                <label for="cardType">Card Type:</label>
                <select id="cardType" name="cardType">
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="amex">American Express</option>
                    <option value="discover">Discover</option>
                </select>
            </div>
            <div>
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" required>
            </div>
            <div>
                <label for="cardExpiry">Expiry Date:</label>
                <input type="month" id="cardExpiry" name="cardExpiry" required>
            </div>
            <div>
                <label for="cardCVC">CVC:</label>
                <input type="text" id="cardCVC" name="cardCVC" required>
            </div>
			<div>
                <label for="amount">amount to buy:</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <div>
                <button type="submit">Submit Payment</button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; One Spot</p>
    </footer>
</body>
</html>
