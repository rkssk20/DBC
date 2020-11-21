<?php
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
  }else{
    // AWS本番環境
    $pdo = new PDO('mysql:host=DATABSE_HOST; dbname=DATABSE_NAME','DATABSE_USER','DATABSE_PASSWORD');
  }

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>