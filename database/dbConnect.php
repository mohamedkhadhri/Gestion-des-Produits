<?php
$servername = "localhost";
$user = "root";
$password = "";
$name = "gestion_bib";

$conn = mysqli_connect($servername, $user, $password, $name);
if (!$conn) {
    die("erruer de connexion avec le base de données");
}
?>