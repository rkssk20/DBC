<?php
  if($_SERVER['SERVER_NAME']=='localhost'){
    $pdo = new PDO('mysql:host=testdb.cppaencyzjj6.ap-northeast-1.rds.amazonaws.com; dbname=dbc','mysql_dbc','password');
  }else{
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','mysql_dbc','password');
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>