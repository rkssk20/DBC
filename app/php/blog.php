<?php
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
  }else{
    // AWS本番環境
    $pdo = new PDO('mysql:host=dbcdb.cppaencyzjj6.ap-northeast-1.rds.amazonaws.com; dbname=dbc','mysql_dbc','password');
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>