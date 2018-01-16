<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';
//echo showHeader();
?>
<html>
<head>
<style>
.topnav {
    background-color: #333;
    overflow: hidden;
}


.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-family: "Arial", "Book Antiqua", Palatino, serif;
    font-size: 30px;
}


.topnav a:hover {
    background-color: #cccccc;
    color: black;
}

.topnav a.active {
    background-color: goldenrod;
    color: white;
} 
.GroupAanwezigheid	{
	display: inline-block;
	color:Indigo;
    border: 3px solid Indigo;
    border-radius: 3px;
    width: 200px;
    margin: 5px;
    object-fit: contain
}


.selector	{
	display: inline-block;
	color:red;
    border: 3px solid Indigo;
    border-radius: 3px;
    height: 200px;
    margin: 5px;
    object-fit: contain
}
	
	
</style>
	
<script src="lrsscript.js"></script>
<link rel="stylesheet" type="text/css" href="opmaaklrs.css">   
<meta charset="utf-8" />
<title> Leerlingen Registratie Systeem </title>
</head>

<body style="background: linear-gradient(rgba(0,0,128,0.7), rgba(128,128,128,0.3));">	
	<div class="klas">
		<?php
		if ($_REQUEST) {
			if (isset($_REQUEST['absentieCode'])) {
				if ($_REQUEST['absentieCode'] == "999"){
					$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
					$sql = $sql .                        " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
					$sql .=  " where `signalering` <> 'Aanwezig' "  ;
				}  else {
					$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
					$sql = $sql .                        " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
					$sql .= sprintf (" where `signalering` ='%s' ",  $_REQUEST['absentieCode']  );
				}
			} 	else   {
				$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
				$sql = $sql .                        " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
			}
		}  else {					
			$sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
			$sql = $sql .                        " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
		}
		echo  "<div class='topnav' >" .   createButons("test") ;
		echo "<a href=  opvragenAanwezigheid.php?absentieCode=999 >Afwezig</a>";
		echo  "</div>";

//					echo($sql);
		$conn = connectToDb();
		$result = $conn->query($sql);

		$vorigID = 9999999;
		while ($row = mysqli_fetch_array($result)) {
			if ($vorigID != $row['leerlingID']) {
				if ($vorigID != 9999999) {
						echo "</div >";
				}
				echo " <div    class='GroupAanwezigheid' id='afbContainer'> ";
				echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=100px  > \n";
				echo "<p   class='leerling'>" . $row['naam'] . " </p> ";
				$vorigID = $row['leerlingID'];
			}
			echo "<p>" . $row['datum'] . " tijd " . $row['tijd'] ." ". $row['signalering'] . " </p>\n";
		
		}
		echo "</div >";
		?>    

			

        <div class="klas">
            <?php
            $sql = "SELECT * , `leerling`.`id` as `leerlingID`  FROM `aanwezigheid` JOIN  `leerling`  on  `leerling`.`id` =  `aanwezigheid`.`leerling_id` ";
            $sql = $sql . " JOIN  `absentie`  on  `absentie`.`id` =  `aanwezigheid`.`absentiecode`";
//			echo($sql);
            $conn = connectToDb();
            $result = $conn->query($sql);

            $vorigID = 9999999;
            while ($row = mysqli_fetch_array($result)) {
                if ($vorigID != $row['leerlingID']) {
                    echo " <div class='leerling' > \n";
                    echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=100px  ></div> \n";
                    echo "<div class='leerling'>" . $row['naam'] . " </div>\n";
                    $vorigID = $row['leerlingID'];
//                    echo "<div class='leerling> </div>\n";
                }
                echo "<p>" . $row['datum'] . " tijd " . $row['tijd'] . " " . $row['signalering'] . " </p>\n";
//                echo "<div </div>\n";
            }
            echo "</div >";
            ?> 
</body			

