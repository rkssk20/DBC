<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

$path = "../";
include('header.php'); 

?>

</header>

<div class="mailpage"></div>

<?php

//トークン判定
if ($_POST['token'] != sha1(session_id()) ){
	echo "不正アクセスの可能性あり";
	exit();
}

if(empty($_POST)) {
	header("Location: mail.php");
	exit();
}

//メールの宛先
$mailTo = 'dbc2020.hp@gmail.com';
 
//Return-Pathに指定するメールアドレス
$returnMail = 'dbc2020.hp@sgmail.com';

//セッション変数等を各変数に設定
$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$subject = "問い合わせ";
$body = $_SESSION['comment'];

mb_language('ja');
mb_internal_encoding('UTF-8');

//Fromヘッダーを作成
$header = 'From: ' . mb_encode_mimeheader($name). ' <' . $mail. '>';

if (mb_send_mail($mailTo, $subject, $body, $header, '-f'. $returnMail)) {
	
	//セッション変数を全て解除
	$_SESSION = array();
	
        //セッションクッキーの削除
	if (isset($_COOKIE["PHPSESSID"])) {
		setcookie("PHPSESSID", '', time() - 1800, '/');
	}

 	//セッションを破棄する
 	session_destroy();
 	
 	echo "メールが送信されました。";
 	
 } else {
	echo "メールの送信に失敗しました。";
}

?>

<?php

$path = "../";
include('footer.php');

?>