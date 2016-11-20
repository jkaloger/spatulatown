<?php
	include 'init.php';

	$name = $_POST['name'];
	$type = $_POST['type'];
	$size = $_POST['size'];
	$colour = $_POST['colour'];
	$price = $_POST['price'];

	echo $name . $type . $size . $colour . $price;
?>