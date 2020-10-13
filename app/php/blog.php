<?php
  $pdo = new PDO('mysql:host=testdb.cppaencyzjj6.ap-northeast-1.rds.amazonaws.com; dbname=dbc','mysql_dbc','password');
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>