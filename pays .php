<?php 
include 'connexion.php';

    $data = "SELECT p.nom as nomPays, langues, population ,urlImage , c.nom as nomContinent,p.id_pays from pays p,continent c where p.id_continent = c.id_continent ";
    $continet = "SELECT * FROM continent.continent";

    $continentName= $conn->query($continet);
    $result = $conn->query($data);

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT p.nom as nomPays, langues, population ,urlImage , c.nom as nomContinent,p.id_pays from pays p,continent c where p.id_continent = c.id_continent and id_pays=$id ";
        $q = $conn->query($sql);
        $ligne= $q->fetch_assoc();
        $nomPays = $ligne['nomPays'];
        $population = $ligne['population'];
        $langues = $ligne['langues'];
        $nomContinent = $ligne['nomContinent'];
        $urlImage = $ligne['urlImage'];
    }
    
    
    


?>