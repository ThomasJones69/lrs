<?php
session_start();
require_once './connection.php';
?>

<html>
    <head>
	<style>

.leerling 
{
	display:inline-block;
}	
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	
<script> 
	
            function aanwezig(leerling) {
//                console.log(leerling.id);
			
			$.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function(data){                                          
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
				alert("Data: " + data + "\nStatus: " + status);
				$('#somediv').html(data);});
			}

</script> 



 <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>
    </head>
    <body>

	<?php
        $sql               = "SELECT * FROM `leerling`";
        $conn              = connectToDb();
        $result            = $conn->query($sql);


        echo "<div class='klas' > ";


        while ($row = mysqli_fetch_array($result)) {
			echo " <div class='leerling' > ";
            echo "<img id = " .$row['id']." src=" . $row['foto'] . " width=142  onclick='aanwezig(this)'></td>";
        }
        echo "</div >";
     ?>
    </body>
</html>