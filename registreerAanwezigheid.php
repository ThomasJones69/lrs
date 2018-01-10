<?php
session_start();
require_once './connection.php';

/*	$item      = $_SESSION['item'];
	$desc      = $_SESSION['desc'];
	$stock     = $_SESSION['stock'];
	$minStock  = $_SESSION['minStock'];
	$maxStock  = $_SESSION['maxStock'];
	$warehouse = $_SESSION['warehouse'];
	require_once './connection.php';
	require_once './model.php';
*/	
	$conn = connectToDb();
	$sql = "SELECT * FROM `aanwezigheid` WHERE `leerling_id` =".$_REQUEST['leerlingID'];
//	$sql = "SELECT * FROM `aanwezigheid` WHERE 1 LIMIT 1 offset " . $_GET['leerlingID'];
	echo($sql);
	$resultSet = $conn->query($sql);
//	if ( mysqli_num_rows($resultSet) != 1 ) {
		$row = $resultSet->fetch_assoc();
		echo( $row['leerling_id'] ) ;
//	} else {
//	echo "aantal  ongelijk aan 1";
	
//	}
/*
	$item      = $row['item'];
	$desc      = $row['description'];
	$stock     = $row['stock'];
	$minStock  = $row['minStock'];
	$maxStock  = $row['maxStock'];
	$warehouse = $row['warehouse'];
	$_SESSION['item']      = $row['item'];
	$_SESSION['desc']      = $row['description'];
	$_SESSION['stock']     = $row['stock'];
	$_SESSION['minStock']  = $row['minStock'];
	$_SESSION['maxStock']  = $row['maxStock'];
	$_SESSION['warehouse'] = $row['warehouse'];
	$objTransportItem = new item();
	$objTransportItem->item        = $item;
	$objTransportItem->description = $desc;
	$objTransportItem->stock       = $stock;
	$objTransportItem->minStock    = $minStock;
	$objTransportItem->maxStock    = $maxStock;
	$objTransportItem->warehouse   = $warehouse;
	echo json_encode($objTransportItem);
*/	
?>