<?php

	include '../db/init.php';

	// get quantity/id of spatulas ordered
	$customer = mysqli_real_escape_string($conn,$_POST['custdetails']);
	$staff = mysqli_real_escape_string($conn,$_POST['staffname']);
	$idspatula = $_POST['id'];	//array of ids
	$quantity = $_POST['quantity']; //array of quantities

	

	// sql: insert order, modify num spatulas
	/* ALERT: YOU NEED TO MODIFY THIS TO DO A SINGLE QUERY AT A TIME */
	$sql = sprintf('
	USE `jkaloger`;
	START TRANSACTION;
	INSERT INTO `Order` (`RequestedTime`,`ResponsibleStaffMember`,`CustomerDetails`)
	VALUES (now(),"%s","%s");
	
	
	',
	$staff,
	$customer
	);

	for($i = 0 ; $i < count($quantity) ; $i++){
		if($quantity[$i] == 0)
			continue;
		$sql .= sprintf('
		INSERT INTO `OrderLineItem` (`idSpatula`,`idOrder`,`Quantity`)
		VALUES (%d,LAST_INSERT_ID(),%d);
		UPDATE `Spatula`
		SET `QuantityInStock` = `QuantityInStock` - 1
		WHERE `idSpatula` = %d;',
		mysqli_real_escape_string($conn,$idspatula[$i]),
		mysqli_real_escape_string($conn,$quantity[$i]),
		mysqli_real_escape_string($conn,$idspatula[$i]));
	}

	$sql .= 'COMMIT;';

	echo $sql;

	if (mysqli_multi_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


	?>