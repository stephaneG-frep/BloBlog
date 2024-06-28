<?php
require_once __DIR__. "/../lib/config.php";
require_once __DIR__. "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";

?>
<div class="px-4 py-5 text-left">
    <h1 class="display-5 fw-bold text-body-emphasis">Admin de bloblog</h1>
    <p class="lead mb-4">Backoffice du site bloblog pour administer les articles</p>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>