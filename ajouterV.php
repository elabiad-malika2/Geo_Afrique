<?php
    include "connexion.php";
    if (isset($_GET['idCity'])) {
        $nomP = $_POST["nom"];
        $continentP=$_POST["continent"];
        $languesP =$_POST["langues"];
        $urlImageP =$_POST["urlImage"];
        $populationP =$_POST["population"];
        $idP=$_POST['id'];
        $sql="UPDATE pays set nom='$nomP', population='$populationP', langues='$languesP', urlImage='$urlImageP', id_continent='$continentP' where id_pays = '$idP' ";
        $conn->query($sql);
        header("Location: Payss.php");
    }else{ 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $nom = $_POST["nom"];
        $pays=$_GET['idCity'];
        $type =$_POST["type"];
        $urlVille =$_POST["urlVille"];
        

        $data= "INSERT INTO ville (nom, type, urlVille,id_ville) 
        VALUES ('$nom','$type','$urlVille','$pays')";

        $conn->query($data);

        header("Location: ville.php?id=$pays");

    }
    }
?>