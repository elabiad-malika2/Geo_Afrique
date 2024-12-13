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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo-Afrique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style >
 
        input[type="search"]::-webkit-search-cancel-button
        {
        -webkit-appearance:none;
        }
        td {
            border-bottom-width: 1px ;
            border-collapse: collapse;


        }

    </style>
    <script>
        tailwind.config = {
        theme: {
            screens: {
                'md': '768px',
            },

            extend: {
            colors: {
                primary: '#5051FA',
                borderColor: '#5f5d5d',
                bgcolor: '#F3F3F3',
                

            },
            fontFamily: {
                'title': ['Poppins','sans-serif'],
                'bigTitle':  ['"Myriad Pro"', 'sans-serif'],
            }
            }
        }
        }
    </script>
</head>
<body>
<div class="flex min-h-screen h-full ">
<aside class="w-52 border-r min-h-full  flex flex-col items-center gap-4 ">
        <div class=" drop-shadow-xl">
            <img src="img/africa.png" alt="">
        </div>
        <div class="">
            <div class="grid gap-4 w-[100%]">
                <a href="" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="img/home.svg" alt=""> Dashboard </a>
            
                <a href='' class='flex gap-4 px-4 py-2 rounded-2xl'><img src='img/3 User.svg' alt=''> Continent </a>
                <a href='' class='flex gap-4 px-4 py-2 rounded-2xl'><img id='btn-icon' class='mt-1' src='img/act.svg' alt=''> Pays</a>
            
               
                <a href="" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="img/Settings_Future.svg" alt=""> Ville </a>
            </div>
        </div>
    </aside>
</div>
</body>
</html>