<?php
/* sans BDD
$articles = [
    ["title" => "Php VS Python", "content" => " Php Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "1-php-vs-python.jpg"],
    ["title" => "React ou React-Native", "content" => " React Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "2-react-vs-react-native.jpg"],
    ["title" => "Les meilleurs outils Devops", "content" => "Devopps Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, sint quam ducimus numquam ea nihil aliquid est ipsam aperiam perferendis incidunt quisquam atque dolores voluptas commodi praesentium omnis placeat exercitationem.", "image" => "3-devops.png"],
];
*/
function getArticles(PDO $pdo, int $limit = null):array
{
    $sql = "SELECT * FROM articles ORDER BY id DESC";
    if ($limit) {
       $sql .= " LIMIT :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
    $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}