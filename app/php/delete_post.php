<?php

require 'db.php';

$sql = 'DELETE FROM post WHERE no = :no';
$stmt = $pdo->prepare($sql);
// (delete_gallery.phpと同じ処理)
$stmt->bindValue(':no', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form_page.php');
exit();
?>