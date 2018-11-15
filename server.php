<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RECEIPT - CZ3006 Assignment 2: PHP Server</title>
</head>
<body>
	<?php
		$banana_final_qty = $_POST['banana-final-qty'];
	?>
	<p>Bananas: <?php print $banana_final_qty; ?></p>

	<!-- Receipt -->

	<table class="table table-hover">
		<thead>
			<tr>
			<th scope="col">Fruit</th>
			<th scope="col">Quantity</th>
			<th scope="col">Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td>Apple</td>
			<td><?php print $apple_final_qty?></td>
			<td><?php print $apple_final_price?></td>
			</tr>
			<tr>
			<th scope="row">2</th>
			<td>Jacob</td>
			<td>Thornton</td>
			<td>@fat</td>
			</tr>
			<tr>
			<th scope="row">3</th>
			<td colspan="2">Larry the Bird</td>
			<td>@twitter</td>
			</tr>
		</tbody>
	</table>
</body>
</html>