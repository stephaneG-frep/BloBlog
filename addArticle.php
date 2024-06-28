<?php
require_once __DIR__. "/lib/config.php";
require_once __DIR__. "/lib/session.php";
adminOnly();

require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/tools.php";
require_once __DIR__. "/lib/article.php";
require_once __DIR__. "/lib/category.php";
require_once __DIR__. "/templates/header.php";
$errors = [];
$messages = [];

$article = [
    'title' => '',
    'content' => '',
    'category_id' => ''
 ];

$categories = getCategories($pdo);

if (isset($_POST['saveArticle'])) {

    $fileName = null;
    // si il y a un fichier envoyé
    if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
        $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
        if ($checkImage !== false) {
            $fileName = slugify(basename($_FILES["file"]["name"]));
            $fileName = uniqid() . '-' . $fileName;
 
           // déplacer le fichier uploader (__DIR__) dans le dossier parent (admin)
            if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__). _ARTICLES_IMAGES_FOLDER_ . $fileName )) {
                if (isset($_POST['image'])) {
                    // suppréssion de l'ancienne image par la nouvelle
                    unlink(dirname(__DIR__)._ARTICLES_IMAGES_FOLDER_ . $_POST['image']);
                }
            } else {
                $errors[] = "Le fichier non ulpoadé";
            }
        } else {
            $errors[] = "Il faut une image";           
        }
    } else {
        // si aucun fichier envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image'])) {
                // supprimer image coché image supprimée
                unlink(dirname(__DIR__)._ARTICLES_IMAGES_FOLDER_ . $_POST['image']);
            } else {
                $fileName = $_POST['image'];
            }
        }
    }
    // Tous stocker dans un tableau pour afficher les infos et ne pas les perdre si il y a une erreur
    $article = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id'],
        'image' => $fileName
    ];

     // saugarde si pas erreur
     if (!$errors) {
        if (isset($_GET['id'])) {
            // typage de l'id (int)
            $id = (int)$_GET['id'];

        } else {
            $id = null;
        }
        // On sauvegarde en BDD avec la fonction saveArticle
        $res = saveArticle($pdo, $_POST["title"], $_POST["content"], $fileName, (int)$_POST["category_id"], $id);

        if ($res) {
            $messages[] = "Article bien enregistré";
            // Vider le formulaire
            if (!isset($_GET['id'])) {
                $article = [
                    'title' => '',
                    'content' => '',
                    'category_id' => ''
                ];
            }
        } else {
            $errors[] = "Article non enregistré";
        }
     }
}
?>
<div class="container">
    <h1>Poster vos articles</h1>

    <?php foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
    <?php } ?>
    <?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
    <?php } ?>
    <?php if ($article !== false) { ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $article['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="8"><?= $article['content']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category_id" id="category" class="form-select">
                <?php foreach ($categories as $category) { ?>
                <option value="1"
                    <?php if (isset($article['category_id']) && $article['category_id'] == $category['id']) { ?>selected="selected"
                    <?php }; ?>><?= $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <?php if (isset($_GET['id']) && isset($article['image'])) { ?>
        <p>
            <img src="<?= _ARTICLES_IMAGES_FOLDER_ . $article['image'] ?>" alt="<?= $article['title'] ?>" width="100">
            <label for="delete_image">Supprimer l'image</label>
            <input type="checkbox" name="delete_image" id="delete_image">
            <input type="hidden" name="image" value="<?= $article['image']; ?>">

        </p>
        <?php } ?>
        <p>
            <input type="file" name="file" id="file">
        </p>

        <input type="submit" name="saveArticle" class="btn btn-primary" value="Enregistrer">

    </form>
</div>
<?php } ?>



<?php require_once __DIR__. "/templates/footer.php"; ?>