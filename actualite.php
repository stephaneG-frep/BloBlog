<?php 
require_once __DIR__. "/lib/article.php";
$id = $_GET['id'];
$article = $articles[$id];

require_once __DIR__. "/lib/menu.php";
$mainMenu["actualite.php"] = ["head_title" => $article["title"], "meta_description" => substr($article["content"], 0, 10), "exclude" => true];

require_once __DIR__. "/templates/header.php";




?>
<div class="container col-xxl-8 px-4 py-5">
    <h1>Votre article...</h1>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="uploads/articles/<?=$article['image'] ?>" class="d-block mx-lg-auto img-fluid"
                alt="<?=$article["title"] ?>" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3"><?=$article["title"] ?></h1>
            <p class="lead"><?= $article['content']?></p>

        </div>
    </div>
</div>



<?php require_once __DIR__. "/templates/footer.php"; ?>