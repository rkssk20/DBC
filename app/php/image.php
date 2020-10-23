<?php

function connectDB() {
  try {
    if($_SERVER['SERVER_NAME']=='localhost'){
      // ローカル開発環境
      $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
    }else{
      // AWS本番環境
      $pdo = new PDO('mysql:host=dbcdb.cppaencyzjj6.ap-northeast-1.rds.amazonaws.com; dbname=dbc','mysql_dbc','password');
    }
      return $pdo;

  } catch (PDOException $e) {
      echo $e->getMessage();
      exit();
  }
}

$pdo = connectDB();

$sql = 'SELECT * FROM images WHERE image_id = :image_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['image_content'];

unset($pdo);
exit();
?>