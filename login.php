<?php
require_once __DIR__. "/lib/config.php";
require_once __DIR__. "/lib/pdo.php";
require_once __DIR__. "/lib/user.php";
require_once __DIR__. "/lib/menu.php";
require_once __DIR__. "/templates/header.php";

$erros = [];

if (isset($_POST['loginUser'])) {   
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = verifyUserLoginPassword($pdo, $email, $password);
    if ($user) {
        session_regenerate_id(true);
        $_SESSION["user"] = $user;
        if ($user['role'] === "user") {
            header("location: index.php");
        } elseif ($user['role'] === "admin") {
            header("location: admin/index.php");
       }
    } else {
        $erros[] = "Email ou mot-de-passe incorrect !!";
    }
}




?>


<div class="container col-xxl-8 px-4 py-5 ">
    <h1> Connexion : </h1>

    <?php  foreach($erros as $error) {?>
    <div class="alert alert-danger">
        <?=$error?>
    </div>
    <?php }?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot-de-passe : </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <input type="submit" value="connexion" name="loginUser" class="btn btn-primary">
    </form>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>