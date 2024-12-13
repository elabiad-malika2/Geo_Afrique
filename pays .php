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
    <div class="grow">
    <header class=" h-20 border-b">
            <nav class=" h-full flex justify-between mx-8 items-center">
                <div class="flex gap-2">
                    <img src="img/Search.svg" alt="">
                    <input class="search outline-none border-none w-64 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search anything here">
                </div>
                <div class="flex w-72 justify-between  items-center ">
                    <img class="cursor-pointer" src="img/settings.svg" alt="">
                    <img class="cursor-pointer" src="img/Icon.svg" alt="">
                    <form action="" action="post">
                        <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                    </form>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class=" cursor-pointer w-10 h-10 bg-black bg-cover rounded-full text-white relative ">
                        <div class="bg-[#228B22] h-3 w-3 rounded-full absolute bottom-0 right-0  "></div>
                        </div>
                    <p class="text-[#606060] font-bold">Malika </p>
                    </div>
                </div>
    
            </nav>
        </header>
        <section class="p-4">
        <div class="flex justify-between items-center px-8">
                <h1> Pays</h1>

            <div class="flex gap-4">
                   
                    <button id="add-etd" onclick=" document.getElementById('modal').classList.remove('hidden')" class="animate__pulse flex gap-2 items-center bg-[#4790cd] px-4 py-2 rounded-lg text-white ">
                        <img src="img/_Avatar add button.svg " alt="">Ajouter Pays
                    </button>
            </div>
            </div> 
        <div class="container mx-auto mt-10 px-4">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-40 object-cover" src="<?php echo $row['urlImage']; ?>" alt="Image de <?php echo $row['nomPays']; ?>">
                        <div class="p-4">
                            <h5 class="text-xl font-semibold mb-2 text-gray-800"><?php echo $row['nomPays']; ?></h5>
                            <p class="text-gray-600 mb-1">Continent : <?php echo $row['nomContinent']; ?></p>
                            <p class="text-gray-600 mb-1">Langues : <?php echo $row['langues']; ?></p>
                            <div class="flex justify-between">
                            <p class="text-gray-600">Population : <?php echo $row['population']; ?></p>
                            <div class="flex gap-2">
                            <button 
                                onclick="
                                    
                                    window.location.href = 'pays.php?id=<?= $row['id_pays']; ?>';
                                ">
                                <img class="w-4 h-4 cursor-pointer" src="img/editinggh.png" alt="">
                            </button>
                                    
                            
                                <a href="delete.php?id=<?php echo $row['id_pays']; ?>">
                                    <img class="w-4 h-4 cursor-pointer" src="img/delete.png" alt="">
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center text-gray-700'>Aucun continent trouvé.</p>";
            }
            ?>
        </div>
        </div>
    </section>
    </div>
</div>
</body>
</html>