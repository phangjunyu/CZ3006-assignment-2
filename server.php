<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RECEIPT - CZ3006 Assignment 2: PHP Server</title>
	<!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	
	<?php
		// get form data
		$name = $_POST['name'];
		$total_cost = $_POST['total-cost'];
		$payment_method = $_POST['customRadioInline1'];

		$apple_final_qty = $_POST['apple-final-qty'];
		$banana_final_qty = $_POST['banana-final-qty'];
		$orange_final_qty = $_POST['orange-final-qty'];

		$apple_final_price = $_POST['apple-final-price'];
		$banana_final_price = $_POST['banana-final-price'];
		$orange_final_price = $_POST['orange-final-price'];

		$total_cost = $_POST['total-cost'];

		// store data in order.txt
		$current_orders = array(0, 0, 0);
		$filename = "order.txt";
		$file = fopen($filename, 'r') or exit("unable to open file($filename)");

		$regex = '/^.*: (?<count>\d*)/';

		if ($file) {
			$i = 0;
			while (($line = fgets($file)) !== false) {
				$matches = array();
				$results = preg_match($regex, $line, $matches);
				$current_orders[$i] = $matches["count"];
				$i++;
			}
			fclose($file);
		} 

		$updated_apples = $current_orders[0] + $apple_final_qty;
		$updated_oranges = $current_orders[1] + $orange_final_qty;
		$updated_bananas = $current_orders[2] + $banana_final_qty;
		
		// windows uses \r\n but test will be run on linux so we use \n
		$updated_orders = "Total number of apples: ".$updated_apples."\n";
		$updated_orders .= "Total number of oranges: ".$updated_oranges."\n";
		$updated_orders .= "Total number of bananas: ".$updated_bananas;

		file_put_contents($filename, $updated_orders);
	?>

	<!-- Receipt -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Receipt - Thank You</h1>
			<p class="lead">Name: <?php print $name?></p>
			<p class="lead">Payment Method: <?php print $payment_method?></p>
		</div>
	</div>
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
			<td>Orange</td>
			<td><?php print $orange_final_qty?></td>
			<td><?php print $orange_final_price?></td>
			</tr>
			<tr>
			<td>Banana</td>
			<td><?php print $banana_final_qty?></td>
			<td><?php print $banana_final_price?></td>
			</tr>
			<td class="lead" style="font-weight: bold;">Total Cost</td>
			<td></td>
			<td class="lead" style="font-weight: bold;"><?php print $total_cost?></td>
		</tbody>
	</table>
</body>
</html>