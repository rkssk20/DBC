<?php

function connectDB() {
    try {
      if($_SERVER['SERVER_NAME']=='localhost'){
        // ローカル開発環境
        $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
      }else{
        // AWS本番環境
        $pdo = new PDO('mysql:host=DATABSE_HOST; dbname=DATABSE_NAME','DATABSE_USER','DATABSE_PASSWORD');
      }
        return $pdo;

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

$pdo = connectDB();

$sql = 'DELETE FROM post WHERE no = :no';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':no', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:form.php');
exit();
?>