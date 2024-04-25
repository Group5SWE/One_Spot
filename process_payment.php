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
    </header>
	<?php
		$item_id=$_POST["item_id"];
		$price=$_POST["price"];
		$amount=$_POST["amount"];
		$category=$_POST["category"];
		$card_type=$_POST["cardType"];
		$card_number=$_POST["cardNumber"];
		$card_expiry=$_POST["cardExpiry"];
		$card_cvc=$_POST["cardCVC"];
		$user_name=$_POST["user_name"];
		
		$host = 'localhost'; // or your host name
		$dbname = 'iloh1'; // your database name
		$username = 'iloh1'; // your database username
		$password = 'iloh1'; // your database password
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			echo "Failed to connect!";
			die("Connection failed: " . $conn->connect_error);
		}
		$add = 'insert into items_sold (buy_price,amount,user_name,category,item_status) values (' . $price . ',' . $amount . ',"' . $user_name . '","' . $category . '","2")';
		$result = $conn->query($add);
		$del = "delete from items where item_id =" . $item_id;
		$result2 = $conn->query($del);
		$pay = 'insert into payment (card_type,card_number,card_expiry,card_cvc,user_name) values ("' . $card_type . '","' . $card_number . '","' . $card_expiry . '","' . $card_cvc . '","' . $user_name . '")';
		$result3 = $conn->query($pay);
	?>
    <div class="message-container">
        <h1 class="center">buy Successful</h1>
        <form id = "form" METHOD="post" ACTION="index.php">
		<?php 
			echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
			echo '<button type="submit" class="right-button">back to homepage</button>';
		?>
		</form>
    </div>
</body>
</html>
