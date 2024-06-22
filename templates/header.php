<?php
   $mainMenu = [
      ["page" => "index.php", "title" => "Accueil", "meta_description" =>"Bloblog votre actu a vous !"],
      ["page" => "actualites.php", "title" => "Les Actus", "meta_description" =>"Toutes les actus!"],
      ["page" => "a_propos.php", "title" => "A propos", "meta_description" =>" L'histoire de Bloblog!"],
   ];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloblog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
</head>

<body>


    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="assets/images/bloblog.jpg" alt="logo du site" width="100px" height="70px">
                    <h3>BLOBLOG...</h3>
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php foreach($mainMenu as $menuItem)  {?>
                <li><a href="<?=$menuItem['page'] ?>" class="nav-link px-2"><?=$menuItem['title'] ?></a></li>
                <?php  }?>
               
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header>
    </div>
    <main>