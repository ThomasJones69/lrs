<?php
session_start();
require_once './connection.php';
require_once './functiesPHP.php';

include_once 'header.php';

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

<!--        <section class="main-container">
        <div class="banner">
            <header><h1>Leerling Registratie Systeem</h1></header>
        </div>
        </section>-->
        
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


    <div id="zoekvak" ondrop='drop(event, this)' ondragover='allowDrop(event)'class='zoek'>
        zoekvak
    </div >
   <br>
   <br>
    <div id="verkeervak" ondrop='drop(event, this)' ondragover='allowDrop(event)'class='zoek'>
        verkeervak
    </div >
   
    <div class="button">
        <button id="newstudent" type="submit" onclick="myPopup()" value="Leerling opvoeren" >Opvoeren Leerling</button> 
    </div>

</div>  
<footer>
    ITPH project mede mogelijk gemaakt door: Thomas, Bas, Gerard en Derk
</footer>
</body>
</html> 