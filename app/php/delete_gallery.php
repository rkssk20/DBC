<?php

require 'db.php';

$sql = 'DELETE FROM images WHERE image_id = :image_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form_page.php');
exit();
?>