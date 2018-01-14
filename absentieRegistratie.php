<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';

?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="lrsscript.js"></script>
<script>
function afwezig(leerling) {
//Function  werkt niet vanuit de js file
    console.log(leerling.id);

    $.post("registreerAfwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
    console.log(leerling.id);
				alert("Data: " + data + "\nStatus: " + status);
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
            <header> Absente leerlingen  </header>
        </div>
        <nav>

        </nav>
        <div class="klas">


    <?php
	
	
			

			
//$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` where `aanwezigheid`.`datum` != '$huidigeDatum'";			
//            $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` where "; 
/*            $sql = "SELECT * FROM `leerling`  order by `schermvolgnr";
            $conn = connectToDb();
            $result = $conn->query($sql);
*/


			zetLeerlingenOpHetScherm(TRUE);
			
/*

            echo "<div class='klas' > ";


            while ($row = mysqli_fetch_array($result)) {
				if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id']) ) {
					echo " <div class='leerling' id='afbContainer'> ";
					echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='afwezig(this)'>";
				}
            }
            echo "</div >";
*/			
            ?>


            <div class="zoek">
                Dit is test
            </div>


        </div>
        <footer>
            ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
        </footer>
    </body>
</html>