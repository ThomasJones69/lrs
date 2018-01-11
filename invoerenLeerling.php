<?php
session_start();
require_once './connection.php';
/*
$naam 			= 	$_REQUEST['naam'];
$adres      	=	$_REQUEST['adres'];
$woonplaats		=	$_REQUEST['woonplaats'];
$tel			=	$_REQUEST['tel'];
$telnood		=	$_REQUEST['telnood'];
$telouders		=	$_REQUEST['telouders'];
$foto			=	"/fotoos/default.jpg";
$klas			=	$_REQUEST['klas'];
$schermvolgnr	=	berekenSchermVolgnr($klas)

*/

	$naam 	= "aswertwer";
	$conn 	= connectToDb();
	$sql = "SELECT *   FROM `leerling`  where `naam` = ".$naam ;
	$result = $conn->query($sql);
	$row 	= mysqli_fetch_array($result) ;
	if ( mysqli_num_rows($row) == 0 ) {
		$klas 			= 1;
		$schermvolgnr	=	berekenSchermVolgnr($klas);	
		$foto			=	"/fotoos/default.jpg";
		
	
		$sql = "INSERT INTO `leerling`(`naam``foto`, `schermvolgnr`, `klas`)" 
		. "VALUES ('$naam', '$foto' , '$schermvolgnr' , '$klas')";
		
	
		//INSERT INTO `leerling`(`id`, `naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) 
		// VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])		
	}
	
	echo($sql);
	$conn              = connectToDb();
	$result            = $conn->query($sql);
	
	
	


	function berekenSchermVolgnr($par_klas){

	$eruit=1;
	$conn              = connectToDb();
	$par_klas = 3;
//	echo $par_klas ;
//	$sql = 
	$sql = "SELECT MAX(schermvolgnr) AS maxSchermVolgnr FROM leerling where `klas` = ".$par_klas;
//	echo $sql;
//	echo "\n";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result) ;
//	echo $result->num_rows;
	if (isset($row['maxSchermVolgnr'])) {
//		echo $row['maxSchermVolgnr'];
		
		$eruit = $row['maxSchermVolgnr'];
		
//		echo "\n";
	} else	{
		$eruit = 1;
	}
	
//	echo $eruit;
//	print_r($eruit);
			
	$conn->close();
//	echo "\n";
	
	return($eruit);
	
	}
?>      

