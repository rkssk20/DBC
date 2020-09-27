<?php

$errorMessage = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    $db = new PDO('mysql:host=mysql_dbc; dbname=login','root','password');
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