<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $nom = $_POST["nom"];
        $continent=$_POST["continent"];
        $langues =$_POST["langues"];
        $urlImage =$_POST["urlImage"];
        $population =$_POST["population"];

        $data= "INSERT INTO pays (nom, population, langues, urlImage,id_continent) 
        VALUES ('$nom','$population','$langues','$urlImage','$continent')";

        $conn->query($data);

        header("Location: pays.php");

    }
?>