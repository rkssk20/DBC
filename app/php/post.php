<?php

require 'db.php';

$error = '';
$title = '';
$content = '';
// issetで変数が存在するか
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];

  // タイトルがなし
  if (!$title) $error .= 'タイトルを記入してください<br>';
  // mb_strlenで文字列の長さ。15文字より長い時。
  if (mb_strlen($title) > 15) $error .= 'タイトルは15文字以内で記入してください<br>';
  // 本文なし
  if (!$content) $error .= '本文を記入してください<br>';
  if (mb_strlen($content) > 300) $error .= 'タイトルは300文字以内で記入してください<br>';

  if(!$error){
    $st = $pdo->query("INSERT INTO post(title,content) VALUES('$title','$content')");

    unset($pdo);

    // locationで飛ぶ
    header('Location: form_page.php');
    exit();

  }else{
    require 'form_page.php';
  }
}