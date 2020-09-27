<?php

function connectDB() {
    try {
        $pdo = new PDO('mysql:host=mysql_dbc; dbname=blog', 'root', 'password');
        return $pdo;

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

$pdo = connectDB();

$sql = 'DELETE FROM images WHERE image_id = :image_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form.php');
exit();
?>