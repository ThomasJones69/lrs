<?php
session_start();
require_once './connection.php';
?>

<html>
    <head>

	<style>


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	
<script> 
	
            function aanwezig(leerling) {
//                console.log(leerling.id);
			
			$.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function(data,status ){                                          
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
				alert("Data: " + data + "\nStatus: " + status);
				$('#somediv').html(data);});
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
            <header>LRS</header>
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
                echo " <div class='leerling' > ";
                echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=142  onclick='aanwezig(this)'></td>";
            }
            echo "</div >";
            ?>


            <div class="zoek">
                Dit is test
            </div>

        </div>
        <footer>
            Dit is een footer
        </footer>
    </body>
</html>