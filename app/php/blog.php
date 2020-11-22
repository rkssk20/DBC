<?php
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
  }else{
    // AWS本番環境
    $HOST = getenv('DATABASE_HOST');
    $NAME = getenv('DATABASE_NAME');
    $USER = getenv('DATABASE_USER');
    $PASSWORD = getenv('DATABASE_PASSWORD');
    $pdo = new PDO("mysql:host=$HOST; dbname=$NAME","$USER","$PASSWORD");
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>