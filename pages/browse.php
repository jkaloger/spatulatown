<?php 
	// spin up mysql db
	include '../db/init.php';

	//load our header tags
	include 'header.php';


?>

<div class="container">
<a href="../">Back</a>
<h1>Browse</h1>

<form id="browseform" method="post" action="../db/search.php">
	<label for="name">Spatula Name</label>
	<input name="name" type="text">
	<label for="type">Select Type</label>
	<select name="type">
		<option value="Food">Food</option>
		<option value="Drugs">Drugs</option>
		<option value="Paints">Paints</option>
		<option value="Plaster">Plaster</option>
	</select>
	<label for="size">Size:</label>
	<input name="size" type="text">
	<label for="colour">Colour:</label>
	<input name="colour" type="text">
	<label for="price">Price (AUD):</label>
	<input name="price" type="text">
	
	<button type="submit" name="submit">Search...
	</button>
</form>

<?php
	include 'footer.php';
?>