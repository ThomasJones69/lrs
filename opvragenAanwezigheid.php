<?php
	session_start();
	require_once './connection.php';
?>
<html>
    <head>

<meta charset="utf-8" />
<title> Leerlingen Registratie Systeem </title>
</head>
<body>


<link rel="stylesheet" type="text/css" href="opmaaklrs.css">
<meta charset="utf-8" />
<title> Leerlingen Registratie Systeem </title>

<div class="banner">
	<header>LRS</header>
</div>
<nav>

</nav>

<div class="klas">

<?php
	
	$sql = "SELECT *   FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` " ;
//	echo($sql);
	$conn              = connectToDb();
	$result            = $conn->query($sql);
		
	
	$vorigID = 9999999	;
	while ($row = mysqli_fetch_array($result)) {
		if ($vorigID != $row['id']){
			echo " <div class='leerling' > \n";
			echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=100px  ></div> \n";
			echo "<div class='leerling'>"  . $row['naam'] .  " </div>\n";
			$vorigID = $row['id'];
			echo "<div class='leerling> </div>\n";
		}
		echo "<div class='leerling'>"  . $row['datum']." tijd ". $row['tijd'] . " </div>\n";
		echo "<div class='leerling> </div>\n";

	}
	echo "</div >";
	
	
		
	
?>      