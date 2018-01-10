<?php
session_start();
require_once './connection.php';
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<style>

.leerling 
{
	display:inline-block;
}	
</style>
	
	
<script> 
	
            function aanwezig(leerling) {
//                var clickedItem = document.getElementById("IDitem").selectedIndex;
                console.log(leerling.id);
                var searchString = document.getElementById("IDitem").selectedIndex;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
//                        console.log("xhttp.responseText");
//                        console.log(xhttp.responseText);
//                        var jsonItemResponse = JSON.parse(xhttp.responseText);
//                        console.log("jsonItemResponse");
//                        console.log(jsonItemResponse);
//                        document.getElementById("item").innerHTML      = jsonItemResponse.item;
/*                        document.getElementById("item").value = jsonItemResponse.item;
                        document.getElementById("desc").value = jsonItemResponse.description;
                        document.getElementById("stock").value = jsonItemResponse.stock;
                        document.getElementById("minStock").value = jsonItemResponse.minStock;
                        document.getElementById("maxStock").value = jsonItemResponse.maxStock;
                        document.getElementById("warehouse").value = jsonItemResponse.warehouse;
*/                    }
                };
                xhttp.open("GET", "registreerAanwezigheid.php?leerlingID=" + searchString, true);
                xhttp.send();
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