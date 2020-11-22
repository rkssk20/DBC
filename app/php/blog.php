<?php
  $aa ="mysql:host=getenv('DATABASE_HOST'); dbname=getenv('DATABSE_NAME')";
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
  }else{
    // AWS本番環境
    $pdo = new PDO($aa,getenv('DATABSE_USER'),getenv('DATABASE_PASSWORD'));
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>