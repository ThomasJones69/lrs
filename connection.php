<?php

require_once './GDconnection.php';

function connectToDb() {
    $out;
    $out = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
    return $out;
}

?>
