<?php
session_start();
require_once './connection.php';
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
		$(leerling).hide();

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
        <div class="banner">
            <header>Leerling Registratie Systeem</header>
        </div>
        <nav>

        </nav>
        <div class="klas">


            <?php
            $sql = "SELECT * FROM `leerling`";
            $conn = connectToDb();
            $result = $conn->query($sql);


            echo "<div class='klas' > ";


            while ($row = mysqli_fetch_array($result)) {
                echo " <div class='leerling' id='afbContainer'> ";
                echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)'>";
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