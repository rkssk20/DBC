<?php

require 'db.php';

// $_POSTでnameがgalleryの時(同じページに別のフォームもあるので、nameで分けた)
if (isset($_POST['gallery'])) {
    // $_FILES(アップロードされたファイル)のimageのnameがempty(空)でない時
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        // 現在の時刻(now())も挿入する
        $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at) VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        // bindValue sqlに指定したおいた値を動的に置き換える
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    // unset 定義した変数を削除
    unset($pdo);
    header('Location:form_page.php');
    exit();

} else {
    // 自作したimagesのcreated_at(作成順)で降順に取得
    $sql = 'SELECT * FROM images ORDER BY created_at DESC';
    // sqlをprepareで設定
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
    // fetchall 結果全てを配列にする
    $images = $stmt->fetchAll();
}

unset($pdo);
?>