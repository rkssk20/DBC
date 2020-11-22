<?php

function connectDB() {
    try {
        if($_SERVER['SERVER_NAME']=='localhost'){
            // ローカル開発環境
            $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
          }else{
            // AWS本番環境
            $pdo = new PDO('mysql:host=getenv("DATABASE_HOST"); dbname=getenv("DATABASE_NAME")','getenv("DATABASE_USER")','getenv("DATABASE_PASSWORD")');
          }
        return $pdo;

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

$pdo = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得
    $sql = 'SELECT * FROM images ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll();

} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    unset($pdo);
    header('Location:form.php');
    exit();
}

unset($pdo);
?>