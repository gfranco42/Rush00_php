<?php
	include ('includes/header.php');
	if (!file_exists('./data'))
	{
		echo "File ./data doesn't exist !\n";
		exit;
	}
	$products = unserialize(file_get_contents("./data/products"));
	$cart = unserialize(file_get_contents("./data/cart"));
	$id = $cart['prod_id'];
	$id -= 1;
	$price = $products[$id]['price'];
	$quantity = $cart['quantity'];
	$total = $price * $quantity;
?>
	<h1>Votre panier !</h1>
	<table>
		<tr>
			<th>Content</th>
			<th>Quantity</th>
			<th>Price per unit</th>
			<th>Price total</th>
		</tr>
		<tr>
			<td><?php foreach ($cart as $key => $value)
			{
				if ($key == 'prod_id' && $value == $products[$id]['name'])
					echo $products[$id]['name'];
				echo "\n";
			} ?></td>
			<td><?php echo $quantity; ?></td>
			<td><?php echo $price; ?> €</td>
			<td><?php echo $total; ?> €</td>
		</tr>
		<tr>
			<td colspan="3">TOTAL PRICE</td>
			<td><?php ?> €</td>
		</tr>
	</table>

<?php include ('includes/footer.php'); ?>
