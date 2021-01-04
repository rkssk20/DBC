<?php

require 'db.php';

// LIMITで取得するデータ(後で設定するimage_id)の上限を1に
$sql = 'SELECT * FROM images WHERE image_id = :image_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

// headerはhttpリクエスト(webサーバーが表示する情報をブラウザに返す)を送信する。上で取得したimageのimage_typeをcontent-typeに指定しheaderで送信
header('Content-type: ' . $image['image_type']);
// 画像を表示
echo $image['image_content'];

unset($pdo);
exit();
?>