<?php
/***************
 *   / ! \ A NE PAS FAIRE  / ! \
 * 
 */
$pdo = new PDO('mysql:dbname=bloblog;host=localhost;charset=utf8mb64', 'root', 'root');
$id = $_GET ['id']; /* mettre (int) devant $_GET pour caster */
$query = $pdo->prepare("SELECT * FROM users WHERE id = $id");/* remplacer $id par :id */
 /*Utilisée cette ligne en plus--> $query->binValue('id', $id, PDO::PARAM_INT) */
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// binValue pour une injection sécurisée


/* 
      A FAIRE
*/
$pdo = new PDO('mysql:dbname=bloblog;host=localhost;charset=utf8mb64', 'root', 'root');
$id = (int)$_GET ['id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

?>