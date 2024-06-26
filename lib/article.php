<?php
/* sans BDD
$articles = [
    ["title" => "Php VS Python", "content" => " Php Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "1-php-vs-python.jpg"],
    ["title" => "React ou React-Native", "content" => " React Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "2-react-vs-react-native.jpg"],
    ["title" => "Les meilleurs outils Devops", "content" => "Devopps Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "3-devops.png"],
];
*/
function getArticles(PDO $pdo, int $limit = null, int $page = null):array
{
    $sql = "SELECT * FROM articles ORDER BY id DESC";
    if ($limit && !$page) {
       $sql .= " LIMIT :limit";
    }
    if ($page) {
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    
    if ($page) {
        $offset = ($page -1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
        }

    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getTotalArticles(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) as total FROM articles";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}


function getArticleById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM articles WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);

    return $article;
}

function getArticleImage(string|null $image):string
{
    if ($image === null) {
        return _ASSETS_IMAGES_FOLDER_."default-article.jpg";
     } else {
       return _ARTICLES_IMAGES_FOLDER_.htmlentities($image);
     }

}