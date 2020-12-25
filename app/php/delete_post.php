<?php

require 'db.php';

$sql = 'DELETE FROM post WHERE no = :no';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':no', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form.php');
exit();
?>