<?php
$db_server = 'localhost';
$db_andmebaas = 'sport';
$db_kasutaja = 'roomet';
$db_salasona = 'Par00l';

$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
if (!$yhendus) {
    die("Probleem andmebaasiga!");
}
?>