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