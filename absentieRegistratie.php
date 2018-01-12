<?php
session_start();
require_once './connection.php';
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="lrsscript.js"></script>
<script>
function afwezig(leerling) {
//Function  werkt niet vanuit de js file
    console.log(leerling.id);

//    $.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
//				alert("Data: " + data + "\nStatus: " + status);
//				$('#somediv').html(data);
    });
}

</script>

        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">
        <style>

        </style>
        <meta charset="utf-8" />
        <title> Leerlingen Absentie Registratie </title>
    </head>
    <body>
        <div class="banner">
            <header>Leerling Absentie Registratie</header>
        </div>
        <nav>

        </nav>
        <div class="klas">


    <?php
	
	
	function leerlingIsVandaagNogNietAanwezigGeregistreerd($paramLeerlingID) {
		$eruit = false;
		$huidigeDatum = date("Y-m-d");
		$huidigeTijd  = date("Hi");

		$conn = connectToDb();
		$sql = "SELECT * FROM aanwezigheid where `leerling_id` = ".$paramLeerlingID ." and datum == '$huidigeDatum'" ;
		echo $sql;
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result) ;
		if (isset($row['leerling_id'])) {
			
			$eruit = true ;
		} else	{
			$eruit = false;
		}
		$conn->close();
	return($eruit);
		
	}
			
	$huidigeDatum = date("Y-m-d");
	$huidigeTijd  = date("Hi");

			
//$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` where `aanwezigheid`.`datum` != '$huidigeDatum'";			
	echo $sql;
//            $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` where "; 
            $sql = "SELECT * FROM `leerling`";
            $conn = connectToDb();
            $result = $conn->query($sql);


            echo "<div class='klas' > ";


            while ($row = mysqli_fetch_array($result)) {
				if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id']) ) {
					echo " <div class='leerling' id='afbContainer'> ";
					echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='afwezig(this)'>";
				}
            }
            echo "</div >";
			
            ?>


            <div class="zoek">
                Dit is test
            </div>

            <div class="button">
                <button type="submit" onclick="myPopup()" value="Leerling opvoeren" >Opvoeren Leerling</button> 
            </div>

        </div>
        <footer>
            ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
        </footer>
    </body>
</html>