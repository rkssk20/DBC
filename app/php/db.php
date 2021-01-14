<?php

try {

  $HOST = getenv('MYSQL_HOST');
  $DATABSE = getenv('MYSQL_DATABASE');
  $USER = getenv('MYSQL_USER');
  $PASSWORD = getenv('MYSQL_PASSWORD');
  
  if($_SERVER['SERVER_NAME']=='localhost'){
    // ローカル開発環境
    $pdo = new PDO("mysql:host=$HOST; dbname=$DATABSE","$USER","$PASSWORD");
  }else{
    // AWS本番環境
    $DATABASE_HOST = getenv('DATABASE_HOST');
    $pdo = new PDO("mysql:host=$DATABASE_HOST; dbname=$DATABSE","$USER","$PASSWORD");
  }
    
  return $pdo;

} catch (PDOException $e) {
  echo $e->getMessage();
  exit();
}