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
function aanwezig(leerling) {
//Function voor het registeren van de leerling, werkt niet vanuit de js file
    console.log(leerling.id);

    $.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
//				alert("Data: " + data + "\nStatus: " + status);
//				$('#somediv').html(data);
		console.log(leerling);
		//$(leerling).hide();
		$(leerling).fadeTo("slow", 0.40);

    });
}

</script>

        <link rel="stylesheet" type="text/css" href="opmaaklrs.css">
        <style>

        </style>
        <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>
    </head>
    <body>
<!--        <div class="banner">
            <header>Leerling Registratie Systeem</header>-->
            <header>Leerling Registratie Systeem
    <nav>
	<div class="main-wrapper">
		<ul>
                    <li><a href="HTMLPage1.php">Hoofdpagina</a></li>
		</ul>
            <!--		<div class="nav-login">-->
                
                <ul>
                    <li><a href="opvragenAanwezigheid.php">Opvragen aanwezigheid</a></li>
		</ul>
        <!--		<div class="nav-login">-->
        <ul>
                    <li><a href="absentieRegistratie.php">Absentie registratie</a></li>
		</ul>

	</div>

    </nav>
	
</header>
        </div>
        <nav>

        </nav>

            <?php
/*    functei is naa functiesPHP         $sql = "SELECT * FROM `leerling`";
            $conn = connectToDb();
            $result = $conn->query($sql);
*/			
			zetLeerlingenOpHetScherm(FALSE);
			
/*  functei is naa functiesPHP
            echo "<div class='klas' > ";


            while ($row = mysqli_fetch_array($result)) {
				if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
					echo " <div class='leerling' id='afbContainer'> ";
				} else {
					echo " <div  style='opacity:0.4' class='leerling' id='afbContainer'> ";
				}
                echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)'> ";
				echo "</div>";
            }
            echo "</div >";
*/			
            ?>


            <div class="zoek">
                Dit is test
            </div>

            <div class="button">
                <button id="newstudent" type="submit" onclick="myPopup()" value="Leerling opvoeren" >Opvoeren Leerling</button> 
            </div>

        </div>  
        <footer>
            ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
        </footer>
    </body>
</html>