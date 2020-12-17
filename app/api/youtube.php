<?php

$get_api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&type=video&order=date&playlistId=PLyiGIE07ww42mJwBTOIkZp7FuGieCOElw&maxResults=3&key=AIzaSyCHVBNcg6gBN0EDm8mC2B-2ZsR0utw4DY8";
$json = file_get_contents($get_api_url);
$getData = json_decode( $json , true);

foreach((array)$getData['items'] as $item){
	$title = $item['snippet']['title'];
  $description = $item['snippet']['description'];
}



if($_SERVER['SERVER_NAME']=='localhost'){
  // ローカル開発環境
  $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
}else{
  // AWS本番環境
  $HOST = getenv('DATABASE_HOST');
  $NAME = getenv('DATABASE_NAME');
  $USER = getenv('DATABASE_USER');
  $PASSWORD = getenv('DATABASE_PASSWORD');
  $pdo = new PDO("mysql:host=$HOST; dbname=$NAME","$USER","$PASSWORD");
}

$sql  = "SELECT * FROM post where title = '$title'";
$res = $pdo->query($sql);

$count = $res->rowCount();

if($count == 0){
  $int = "INSERT INTO post (title,content) VALUES ('$title','$description')";
  $db = $pdo->query($int);
}

?>