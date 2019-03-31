<?php
    include ('includes/header.php');
	if (!file_exists('./data'))
	{
		echo "File ./data doesn't exist !\n";
		exit;
	}
	if (isset($_POST))
	{
		if (empty('./data/cart') === FALSE)
			$cart = unserialize(file_get_contents("./data/products"));
		$products = unserialize(file_get_contents("./data/products"));
		$categories = unserialize(file_get_contents("./data/categories"));
		if ($_POST['quantity'] > 0)
		{
			$_SESSION['cart'] = array(
				'cart_id' => '',
				'user' => $_SESSION['user'],
				'prod_id' => $_POST['id'],
				'quantity' => $_POST['quantity']
			);
		}
		$seri = serialize($_SESSION['cart']);
		file_put_contents("./data/cart", $seri);
		foreach ($categories as $cat_value)
		{
			echo ($cat_value['label']);?><br/><?php
			foreach ($products as $prod_value)
			{
				if ($cat_value['name'] === $prod_value['category'])
				{
					$img = $prod_value['url'];
					$price = $prod_value['price'];
					echo "<img src='$img'>";
				}
			}
			?><br/><?php
			foreach ($products as $prod_value)
			{
				if ($cat_value['name'] === $prod_value['category'])
				{
					$price = $prod_value['price'];
					echo $price, '€';
					?><form method="POST" action="index.php">
						Quantité : <input type="number" name="quantity" min="0" max="" value="0">
						<input type="submit" name="submit" value="Add">
						<input type="hidden" name="id" value="<?php echo $prod_value['id']; ?>"/>
					</form>
					<?php
				}
			}
			?><br/><?php
		}
		?><br/><?php
	}
	print_r($_POST);
?>

<?php include ('includes/footer.php');?>
