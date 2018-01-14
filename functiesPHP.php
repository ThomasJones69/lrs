<?php
require_once './connection.php';

	function leerlingIsVandaagNogNietAanwezigGeregistreerd($paramLeerlingID) {
		$eruit = false;
		$huidigeDatum = date("Y-m-d");
		$huidigeTijd  = date("Hi");
		$conn = connectToDb();
		$sql = "SELECT * FROM aanwezigheid where `leerling_id` = ".$paramLeerlingID .
		" and datum = '$huidigeDatum'" ;
//		echo $sql;
		$result = $conn->query($sql);
		if ($result) {
			$row = mysqli_fetch_array($result) ;
			if (isset($row['leerling_id'])) {
//				echo " 56 ";
				$eruit = false ;
			} else	{
				//echo " 59 ";
				$eruit = true;
			}
		}  else {
//			echo " 63 ";
			
			$eruit = true;
		}
		$conn->close();
		return($eruit);
	}

	function zetLeerlingenOpHetScherm($alleenAbsenteLeerlingen){
		$sql = "SELECT * FROM `leerling`  order by `schermvolgnr";
		$conn = connectToDb();
		$recordSet = $conn->query($sql);
		if ($recordSet) {
			echo "<div class='klas' > ";
				while ($row = mysqli_fetch_array($recordSet)) {
					if ($alleenAbsenteLeerlingen) {
						// dit is de tak voor de absente leerlingen registratie
						if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
							echo " <div class='leerling' id='afbContainer'> ";
							echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='afwezig(this)'> ";
							echo createTagSelect("selectorAbsentie");
							echo "</div>";
						} 
					} else {
						// dit is de tak voor de aanwezigheid
						if (leerlingIsVandaagNogNietAanwezigGeregistreerd($row['id'])) {
							echo " <div class='leerling' id='afbContainer'> ";
						}  else {
							echo " <div  style='opacity:0.4' class='leerling' id='afbContainer'> ";
						}
						echo "<img id = " . $row['id'] . " src=" . $row['foto'] . " width=130  onclick='aanwezig(this)'> ";
						echo "</div>";
					} 
				}
			echo "</div >";
		}	
	}
	

        function createTagSelect($selectidname) {
			$ParamConn = connectToDb();
            $sql           = "SELECT * FROM `absentie` ";
            $erinResultSet = $ParamConn->query($sql);
            $eruit = "<select id=$selectidname onClick=verwerkAbsentie(); >";  
            for ($x = 0; $x < $erinResultSet->num_rows; $x++) {
                $row = $erinResultSet->fetch_assoc();  
				$eruit .= "<option>";   
                $eruit .= "["; 
                $eruit .= $row['id']; 
                $eruit .= "]  "; 
                $eruit .= $row['signalering'];
                $eruit .= "</option>";
            }
            $eruit .= "</select>"; 

            return $eruit; 
        }

	
	
	

?>