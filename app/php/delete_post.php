<?php

function connectDB() {
    try {
        $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc', 'root', 'password');
        return $pdo;

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

$pdo = connectDB();

$sql = 'DELETE FROM post WHERE no = :no';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':no', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form.php');
exit();
?>