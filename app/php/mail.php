<?php

$request_param = $_POST;

date_default_timezone_set('Asia/Tokyo');
$request_datetime = date("Y/m/d H:i:s");

$mailto = $request_param['email'];
$to = "dbc2020.hp@gmail.com";
$mailfrom = "dbc2020.hp@gmail.com";
$subject = "お問い合わせ、ありがとうございます。";

$content = "";
$content .= $request_param['name']. "様\r\n";
$content .= "お問い合わせ、ありがとうございます。\r\n";
$content .= "=================================\r\n";
$content .= "お名前：" . htmlspecialchars($request_param['name'])."\r\n";
$content .= "メールアドレス：" . htmlspecialchars($request_param['email'])."\r\n";
$content .= "お問い合わせ内容：" . htmlspecialchars($request_param['content'])."\r\n";
$content .= "お問い合わせ日時：" . $request_datetime."\r\n";
$content .= "=================================\r\n";

//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "=================================\r\n";
$content2 .= "お名前：" . htmlspecialchars($request_param['name'])."\r\n";
$content2 .= "メールアドレス：" . htmlspecialchars($request_param['email'])."\r\n";
$content2 .= "お問い合わせ内容：" . htmlspecialchars($request_param['content'])."\r\n";
$content2 .= "お問い合わせ日時：" . $request_datetime."\r\n";
$content2 .= "================================="."\r\n";

mb_language("ja");
mb_internal_encoding("UTF-8");
//mail 送信
if($request_param['token'] === '1234567'){
if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
   mb_send_mail($mailto,$subject,$content,$mailfrom);
   ?>
   <script>
       window.location = "送信した後に表示されるページのURL";
   </script>
   <?php
} else {
   header('Content-Type: text/html; charset=UTF-8');
 echo "メールの送信に失敗しました";
};
} else {
echo "メールの送信に失敗しました（トークンエラー）";
}


?>