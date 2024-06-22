<?php 
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/lib/articles.php";

?>
<div class="container col-xxl-8 px-4 py-5">
    <h1>Actualités</h1>

    <div class="row text-center">
        <?php foreach($articles as $key=>$article) {
                 require __DIR__. "/templates/article_part.php";    
           } ?>
    </div>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>