<?php

require 'db.php';

$error = '';
$title = '';
$content = '';
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];

  if (!$title) $error .= 'タイトルを記入してください<br>';
  if (mb_strlen($title) > 15) $error .= 'タイトルは15文字以内で記入してください<br>';
  if (!$content) $error .= '本文を記入してください<br>';
  if (mb_strlen($content) > 300) $error .= 'タイトルは300文字以内で記入してください<br>';

  if(!$error){
    $st = $pdo->query("INSERT INTO post(title,content,time) VALUES('$title','$content',now())");

    unset($pdo);

    header('Location: form_page.php');
    exit();

  }else{
    require 'form_page.php';
  }
}