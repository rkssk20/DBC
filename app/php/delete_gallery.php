<?php

require 'db.php';

$sql = 'DELETE FROM images WHERE image_id = :image_id';
$stmt = $pdo->prepare($sql);
// 元ページから、delete_gallery.php?id=<?= $images[$i]['image_id']の形で削除したいidがURLに渡されるので、$_GETでURLに渡されたidを取得して削除
$stmt->bindValue(':image_id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form_page.php');
exit();
?>