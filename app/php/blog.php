<?php
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
  }else{
    // AWS本番環境
    $pdo = new PDO('mysql:host=$_ENV["DATABASE_HOST"]; dbname=$_ENV["DATABSE_NAME"]','$_ENV["DATABSE_USER"]','$_ENV["DATABASE_PASSWORD"]');
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>