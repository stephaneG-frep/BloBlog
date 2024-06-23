<?php
   $mainMenu = [
      'index.php' => ["menu-title" => "Accueil", "head_title" => "Accueil_bloblog_site _d'actus..", "meta_description" =>"Bloblog votre actu a vous !"],
      'actualites.php' => ["menu-title" => "Les Actus", "head_title" => "Toutes les actualitées de_bloblog_site _d'actus..", "meta_description" =>"Toutes les"],
      'a_propos.php' =>["menu-title" => "A propos", "head_title" => "L'histoire de_bloblog_site _d'actus..", "meta_description" =>" L'histoire de Bloblog!"],
   ];

    $currentPage = basename($_SERVER["SCRIPT_NAME"]);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=@$mainMenu[$currentPage]['meta_description']?>">
    <title><?=@$mainMenu[$currentPage]['head_title']?></title>
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

            <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php foreach($mainMenu as $key=>$menuItem)  {?>
                <li class="nav-item"><a href="<?=$key?>" class="nav-link px-2 <?php
                     if ($key === $currentPage) { echo"active"; }
                     //echo($key === $currentPage) ? "active : "";
                     ?>"><?=$menuItem['menu-title'] ?></a></li>
                <?php  }?>

            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header>
    </div>
    <main>