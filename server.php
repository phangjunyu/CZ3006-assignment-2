<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RECEIPT - CZ3006 Assignment 2: PHP Server</title>
</head>
<body>
	<?php
		$banana_final_qty = $_POST['banana-final-qty'];
		echo $banana_final_qty;
	?>
	<p>Bananas: <?php print $banana_final_qty; ?></p>
</body>
</html>