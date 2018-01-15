<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';
//echo showHeader();
?>
<html>
    <head>
<style>
.GroupAanwezigheid	{
	color:red;
    border: 3px solid DimGray;
    border-radius: 3px;
    width: 200px;
    margin: 5px;
    object-fit: contain
}
	
</style>
	
		<script src="lrsscript.js"></script>
       <link rel="stylesheet" type="text/css" href="opmaaklrs.css">   
        <meta charset="utf-8" />
        <title> Leerlingen Registratie Systeem </title>

        <div class="banner">
            <header>LRS</header>
        </div>
        <nav>

        </nav>

    </head>
    <body>



        <div class="klas">
            <?php
            $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
			$sql = $sql .                        " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
//			echo($sql);
            $conn = connectToDb();
            $result = $conn->query($sql);

            $vorigID = 9999999;
            while ($row = mysqli_fetch_array($result)) {
                if ($vorigID != $row['leerlingID']) {
					echo " <div    class='GroupAanwezigheid' id='afbContainer'> ";
//                    echo " <div class='leerling' > \n";
                    echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=100px  > \n";
                    echo "<p   class='leerling'>" . $row['naam'] . " </p> ";
                    $vorigID = $row['leerlingID'];
                }
                echo "<p>" . $row['datum'] . " tijd " . $row['tijd'] ." ". $row['signalering'] . " </p>\n";
				echo "</div >";
            }
            echo "</div >";
            ?>      