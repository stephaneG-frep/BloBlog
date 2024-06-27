<?php 
require_once __DIR__. "/lib/config.php";
require_once __DIR__. "/lib/tools.php";
require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/user.php";
require_once __DIR__. "/templates/header.php";

$errors = [];
$messages = [];
if (isset($_POST['addUser'])) {
    $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    if ($res) {
        $messages[] = "Merci pour votre inscription";
    } else {
        $errors[] = "Une erreur s'est produite pendant votre inscription";
    }
}

?>

<div class="container">
<h1>Inscription</h1>

<?php foreach($messages as $message) {?>
<div class="alert alert-success" role="alert">
    <?=$message ?>
</div>
<?php }?>
<?php foreach($errors as $error) {?>
<div class="alert alert-success" role="alert">
    <?=$error ?>
</div>
<?php }?>



    <form action="" method="post">
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom : </label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Nom : </label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot-de-passe : </label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <input type="submit" name="addUser" class="btn btn-primary" value="Enregistrer">
    </form>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>