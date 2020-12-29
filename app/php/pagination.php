<?php

require 'db.php';

$path = "../";
include 'header.php';

// 1ページの表示数
const MAX = 3; 

// SQLの実行。queryは入力を含まない。prepareは含める。
$posts = $pdo->query("SELECT * FROM post");
// fetchAllは結果を配列で返す。PDO::FETCH_ASSOCは連想配列で取得。
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

// 総数
$posts_num = count($posts);
$max_page = ceil($posts_num / MAX);

// $_GETには送信された値が連想配列で格納されている。
// その中でページ数のpage_idがなければ1ページ目。あればそのページ数に。
if(!isset($_GET['page_id'])){
  $now = 1;
}else{
  $now = $_GET['page_id'];
}

$start_no = ($now - 1) * MAX;
// 配列のstart_no(現在のページ - 1)インデックスからMAX(取得数分)を取得
$disp_data = array_slice($posts, $start_no, MAX, true);

foreach($disp_data as $values){
  echo $values['title'].'<br>';
  echo $values['content'].'<br>';
  echo $values['time'].'<br>'.'<br>'.'<br>';
}



echo '<div class="postpage-pagination">';

if($now > 1){
  echo '<a class="postpage-prev" href="pagination.php?page_id='.($now - 1).'">前へ</a>'. ' ';
}else{
  echo '前へ'. ' ';
}

if($now > 2){
  echo '<a class="postpage-prev" href="pagination.php?page_id=1">1</a>'. ' ';
}

echo '<p class="postpage-point">…</p>';

for($i = $now - 1; $i <= $now + 1; $i++){
  if($i == 0){
    continue; 
  }else if($i == $max_page + 1){
    break;
  }else if($i == $now){
    echo $now. ' ';
  }else{
    echo '<a class="postpage-number" href="pagination.php?page_id='. $i. '">'. $i. '</a>'. ' ';
  }
}

echo '<p class="postpage-point">…</p>';

if($now < $max_page - 1){
  echo '<a class="postpage-prev" href="pagination.php?page_id='. $max_page.'">'. $max_page. '</a>'. ' ';
}

if($now < $max_page){
  echo '<a class="postpage-next" href="pagination.php?page_id='.($now + 1).'">次へ</a>'. ' ';
}else{
  echo '次へ';
}

echo '</div>';



$path = "../";
// include 'footer.php';

?>