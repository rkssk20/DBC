<?php

function connectDB() {
    try {
      if($_SERVER['SERVER_NAME']=='localhost'){
        // ローカル開発環境
        $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
      }else{
        // AWS本番環境
        $pdo = new PDO('mysql:host=getenv("DATABASE_HOST"); dbname=getenv("DATABASE_NAME")','getenv("DATABASE_USER")','getenv("DATABASE_PASSWORD")');
      }
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