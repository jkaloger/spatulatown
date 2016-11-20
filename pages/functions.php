<?php

function getStockRows($c) {
	$order = '<input type="text" name="quantity">';
	$sql = "SELECT * FROM `Spatula`";

	$spatulas = mysqli_query($c, $sql);

	// make sure we have at least 1 spatula
	if(mysqli_num_rows($spatulas) > 0) {
		while($srow = mysqli_fetch_assoc($spatulas)) {
			// when we have no stock, we apply some styling to prevent invalid orders
			if(($quantity = $srow['QuantityInStock']) > 0){
				$inputrow = '<td><input type="text" name="quantity[]"></td>';
				$color = 'black';
			}
			else {
				$inputrow = '<td><input type="text" name="quantity[]" disabled></td>';
				$color = 'red';
			}
			// print our table to the screen
			printf('
				<tr>
					<td><input type="hidden" name="id[]" value="%d">%d</td>
					<td>%s</td>
					<td>%s</td>
					<td>%dcm</td>
					<td>%s</td>
					<td>$%s</td>
					<td style="color:%s;">%d</td>
					%s
				</tr>
				',
				$id = $srow['idSpatula'],
				$id,
				$srow['ProductName'],
				$srow['Type'],
				$srow['Size'],
				$srow['Colour'],
				$srow['Price'],
				$color,
				$quantity,
				$inputrow
			);

		}
	}

	mysqli_free_result($spatulas);

}

?>