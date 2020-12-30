<?php

$path = "../";
include 'header.php';

echo '</header>';



require 'db.php';

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

?>


<div class="postpage-top">
  <?php foreach ($disp_data as $post) { ?>
    <div class="postpage">
  
      <h1 class="postpage-title"><?php echo $post['title'] ?></h1>
      <p class="postpage-content"><?php echo nl2br($post['content']) ?></p>

      <?php if(strstr($post['url'],'youtube.com')): ?>
      <a target="_blank" href="<?php echo $post['url'] ?>"><img class="postpage-youtube" src="../public/youtube_social_icon_red.png" alt="YouTube icon"></a>
      <?php elseif(strstr($post['url'],'dokkyobc.blog.fc2.com')): ?>
      <a target="_blank" href="<?php echo $post['url'] ?>"><img class="postpage-blog" src="../public/44433.png" alt="blog icon"></a>
      <?php else: ?>
      <p class="post-news">News</p>
      <?php endif; ?>
  
      <p class="postpage-time"><?php echo substr($post['time'],0,10) ?></p>
    </div>
  <?php } ?>
</div>



<?php

echo '<div class="postpage-pagination">';

  if($now > 1){
    echo '<a class="postpage-button" href="post_page.php?page_id='.($now - 1).'"><</a>'. ' ';
  }

  if($now > 2){
    echo '<a class="postpage-button" href="post_page.php?page_id=1">1</a>'. ' ';
  }

  if($now > 3){
    echo '<a>…</a>';
  }

  for($i = $now - 1; $i <= $now + 1; $i++){
    if($i == 0){
      continue; 
    }else if($i == $max_page + 1){
      break;
    }else if($i == $now){
      echo '<a class="postpage-now postpage-button">'. $now .'</a>';
    }else{
      echo '<a class="postpage-button" href="post_page.php?page_id='. $i. '">'. $i. '</a>'. ' ';
    }
  }

  if($now < $max_page - 2){
    echo '<a>…</a>';
  }

  if($now < $max_page - 1){
    echo '<a class="postpage-button" href="post_page.php?page_id='. $max_page.'">'. $max_page. '</a>'. ' ';
  }

  if($now < $max_page){
    echo '<a class="postpage-button" href="post_page.php?page_id='.($now + 1).'">></a>'. ' ';
  }

echo '</div>';



$path = "../";
include 'footer.php';

?>