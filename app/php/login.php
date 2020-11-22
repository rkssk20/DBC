<?php

$errorMessage = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    if($_SERVER['SERVER_NAME']=='localhost'){
      // ローカル開発環境
      $db = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
    }else{
      // AWS本番環境
      $db = new PDO('mysql:host=.$_ENV["DATABASE_HOST"].; dbname=.$_ENV["DATABSE_NAME"].','.$_ENV["DATABSE_USER"].','.$_ENV["DATABASE_PASSWORD"].');
    }

    $sql = 'select count(*) from users where username=? and password=?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username,$password));
    $result = $stmt->fetch();
    $stmt = null;
    $db = null;

    if ($result[0] != 0){
      include('form.php');
    exit;

    }else{
      $errorMessage = "入力に間違いがあります。";
    }

  }catch (PDOExeption $e) {
    echo $e->getMessage();
    exit;
  }
}