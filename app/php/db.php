<?php

try {
  
  $HOST = getenv('MYSQL_HOST');
  $DATABSE = getenv('MYSQL_DATABASE');
  $USER = getenv('MYSQL_USER');
  $PASSWORD = getenv('MYSQL_PASSWORD');
  $pdo = new PDO("mysql:host=$HOST; dbname=$DATABSE","$USER","$PASSWORD");
  // $pdo = new PDO("mysql:host=mysql_dbc; dbname=dbc","root","password");
    
  return $pdo;

} catch (PDOException $e) {
  echo $e->getMessage();
  exit();
}