<?php

$path = "../";
include('header.php'); 

?>

</header>

<div class="mailpage"></div>

<p class="newpost-head">更新情報</p>
<?php require 'blog.php'; foreach ($posts as $post) { ?>
  <div class="newpost">
    <h1 class="newpost-title"><?php echo $post['title'] ?></h1>
    <p class="newpost-content"><?php echo nl2br($post['content']) ?></p>
    <p class="newpost-time"><?php echo substr($post['time'],0,10) ?></p>
  </div>
<?php } ?>



<?php

$path = "../";
include('footer.php');

?>