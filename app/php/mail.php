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

//前後にある半角全角スペースを削除する関数
function spaceTrim ($str) {
	// 行頭
	$str = preg_replace('/^[ 　]+/u', '', $str);
	// 末尾
	$str = preg_replace('/[ 　]+$/u', '', $str);
	return $str;
}

//エラーメッセージの初期化
$errors = array();

if(empty($_POST)) {
	header("Location: mail_form.php");
	exit();
}else{
	//POSTされたデータを各変数に入れる
	$name = isset($_POST['name']) ? $_POST['name'] : NULL;
	$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
	$comment = isset($_POST['comment']) ? $_POST['comment'] : NULL;
	
	//前後にある半角全角スペースを削除
	$name = spaceTrim($name);
	$mail = spaceTrim($mail);
	$comment = spaceTrim($comment);

	//名前入力判定
	if ($name == ''){
		$errors['name'] = "名前が入力されていません。";
	}else{
		if(mb_strlen($name)>10){
			$errors['name_length'] = "名前は10文字以内で入力して下さい。";
		}
	}
	
	//メール入力判定
	if ($mail == ''){
		$errors['mail'] = "メールが入力されていません。";
	}
	
	//コメント入力判定
	if ($comment == ''){
		$errors['comment'] = "コメントが入力されていません。";
	}else{
		if(mb_strlen($comment)>1000){
			$errors['comment_length'] = "コメントは1000文字以内で入力して下さい。";
		}
	}
}

//エラーが無ければセッションに登録
if(count($errors) === 0){
	$_SESSION['name'] = $name;
	$_SESSION['mail'] = $mail;
	$_SESSION['comment'] = $comment;
}

?>
 
<?php if (count($errors) === 0): ?>

<form class="mailpage-form" action="send.php" method="post">

<p class="mailpage-text">名前：<br><?=htmlspecialchars($name, ENT_QUOTES)?></p>
<p class="mailpage-text">メールアドレス：<br><?=htmlspecialchars($mail, ENT_QUOTES)?></p>
<p class="mailpage-text">お問い合わせ内容: <br><?=nl2br(htmlspecialchars($comment, ENT_QUOTES))?></p>

<input type="button" value="戻る" onClick="history.back()">
<input type="hidden" name="token" value="<?=$_POST['token']?>">
<input type="submit" value="送信する">

</form>

<?php elseif(count($errors) > 0): ?>

<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>

<input type="button" value="戻る" onClick="history.back()">

<?php endif; ?>

<?php

$path = "../";
include('footer.php');

?>