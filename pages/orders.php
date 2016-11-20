<?php 
	// spin up mysql db
	include '../db/init.php';

	include 'functions.php';

	//load our header tags
	include 'header.php';

?>
<div class="container">
<a href="../">Back</a>
<h1>Orders</h1>

	<form method="post" action="../db/order.php">
		<label for="custdetails">Customer Details:<br></label>
		<textarea name="custdetails"></textarea>

		<label for="staffname">Responsible Staff Member: </label>
		<input type="text" name="staffname">

		<table class="orderstable">
			<tr id="head">
				<th>Spatula ID</th>
				<th>Name</th>
				<th>Type</th>
				<th>Size</th>
				<th>Colour</th>
				<th>Price</th>
				<th>Quantity Currently in stock</th>
				<th>Order Quantity</th>
			</tr>
			<?php getStockRows($conn) ?>
		</table>

		<button name="submit" type="submit" value="submit">Submit</button>
	</form>
</div>


<?php
	include 'footer.php';
?>