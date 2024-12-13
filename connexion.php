<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'continent';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// $sql = "SELECT nom, langues, urlImage,population FROM pays";
// $result = $conn->query($sql);


?>
