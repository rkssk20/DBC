<?php

$path = "../";
include 'header.php';

echo '</header>';



require 'db.php';
require 'blog.php';


// 1ページの表示数
const MAX = 3; 

// 結果の総数
$posts_num = count($posts);
// ceilは小数点切り上げ。総数を1ページの表示数で割って総ページ数を求める
$max_page = ceil($posts_num / MAX);

// issetで変数が存在するか確認。今回は$_GETでpage_idがURLに渡されたか。
// $_GETで渡されたパラメータをURLに付与($_POSTは付与しない)。
// URLが渡されていない=初めて1ページ目に来た場合、1ページ目。それ以外はそのページへ。
if(!isset($_GET['page_id'])){
  $now = 1;
}else{
  $now = $_GET['page_id'];
}

// １つ前のページ($now - 1) * 1ページの表示数(MAX)で、前のページまでいくつ表示されたのかを求める。求めた値は最後のページの最後の番目になるが、下でインデックスとして使用するので現在のページの1つ目の要素を意味することになる。
$start_no = ($now - 1) * MAX;
// array_sliceで$postsの$start_noからMAXまで取得
$disp_data = array_slice($posts, $start_no, MAX, true);

?>


<div class="postpage-top">
  <?php foreach ($disp_data as $post) { ?>
    <div class="postpage">
  
      <h1 class="postpage-title"><?php echo $post['title'] ?></h1>

      <p class="postpage-content">
      <!-- strstrで指定した文字列(が最初に現れる位置)を検索-->
      <?php if(strstr($post['url'],'youtube.com')): ?>
      <!-- n12brで改行を<br>に変換 -->
      <?php echo nl2br($post['content']) . '<span class="postpage-span">(続きはYouTube)</span>' ?>
      <?php elseif(strstr($post['url'],'dokkyobc.blog.fc2.com')): ?>
        <?php echo nl2br($post['content']) . '<span class="postpage-span">(続きはブログ)</span>' ?>
      <?php else: ?>
      <?php echo nl2br($post['content']) ?>
      <?php endif; ?>
      </p>

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

  // 現在が2ページ目以降の時、戻るボタンを設置
  if($now > 1){
    // 戻るボタンのURLは現在の1ページ前に設定
    echo '<a class="postpage-button" href="post_page.php?page_id='.($now - 1).'"><</a>'. ' ';
  }

  // ３ページ目以降の時、１ページに戻るボタン設置
  if($now > 2){
    echo '<a class="postpage-button" href="post_page.php?page_id=1">1</a>'. ' ';
  }

  // 4ページ目以降(１ページボタンと、現在の前ページ(最低でも3)の間に省略を入れる)
  if($now > 3){
    echo '<a>…</a>';
  }

  // 現在の1ページ前から1ページ後までの3ページをボタンとして設置
  for($i = $now - 1; $i <= $now + 1; $i++){
    // 1ページ目の時、1ページ前が0ページになるので飛ばす
    if($i == 0){
      continue; 
    // 1ページ後が最大ページを超える時、もうないので終了
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