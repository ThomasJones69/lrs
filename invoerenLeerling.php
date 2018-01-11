<?php
session_start();
require_once './connection.php';
$naam 			= 	$_REQUEST['naam'];
$adres      	=	$_REQUEST['adres'];
$woonplaats		=	$_REQUEST['woonplaats'];
$tel			=	$_REQUEST['tel'];
$telnood		=	$_REQUEST['telnood'];
$telouders		=	$_REQUEST['telouders'];
$foto			=	"fotoos/default.jpg";
$klas			=	$_REQUEST['klas'];
$schermvolgnr	=	berekenSchermVolgnr($klas);

$conn 	= connectToDb();
$sql = "SELECT *   FROM `leerling`  where `naam` = '$naam' ";
$result = $conn->query($sql);

if ( $result->num_rows  == 0 ) {
	$schermvolgnr	=	berekenSchermVolgnr($klas);	
	$foto			=	"fotoos/default.jpg";

	$sql = "INSERT INTO `leerling`(`naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) "
		   . "VALUES ( '$naam', '$adres' , '$woonplaats' , '$tel' , '$telnood' , '$telouders' , '$foto','$schermvolgnr','$klas') "; 		
	echo($sql);
	$conn              = connectToDb();
	$result            = $conn->query($sql);
	}


function berekenSchermVolgnr($par_klas){
	$conn = connectToDb();
	$sql = "SELECT MAX(schermvolgnr) AS maxSchermVolgnr FROM leerling where `klas` = ".$par_klas;
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result) ;
	if (isset($row['maxSchermVolgnr'])) {
		$eruit = $row['maxSchermVolgnr'];
		$eruit = $eruit + 1;
	} else	{
		$eruit = 1;
	}
	$conn->close();
return($eruit);
}
?>      
