<?php

$path = "../";
include 'header.php'; 

?>

</header>



<div class="postpage-top">
  <?php require 'blog.php'; foreach ($posts as $post) { ?>
    <div class="postpage">
      <p class="postpage-new">New</p>
  
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

$path = "../";
include 'footer.php';

?>