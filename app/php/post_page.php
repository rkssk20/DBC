<?php

$path = "../";
include 'header.php';

echo '</header>';



require 'db.php';
require 'blog.php';


const MAX = 3; 

$posts_num = count($posts);
$max_page = ceil($posts_num / MAX);

if(!isset($_GET['page_id'])){
  $now = 1;
}else{
  $now = $_GET['page_id'];
}

$start_no = ($now - 1) * MAX;
$disp_data = array_slice($posts, $start_no, MAX, true);

?>


<div class="postpage-top">
  <?php foreach ($disp_data as $post) { ?>
    <div class="postpage">
  
      <h1 class="postpage-title"><?php echo $post['title'] ?></h1>

      <p class="postpage-content">
      <?php if(strstr($post['url'],'youtube.com')): ?>
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