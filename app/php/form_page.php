<?php

session_start();
if(!isset($_SESSION['USER'])){
  header("Location:logout_page.php");
  exit;
}

require 'gallery.php';
require 'blog.php';

$path = "../";
include 'header.php';


?>

</header>



<!-- 記事投稿 -->
<form class="form-top" method="post" action="post.php">
  <h3 class="form-title">記事投稿</h3>
  <font color="#ff0000">
    <?php

    echo $error;

    ?>
  </font>
  <div class="form-content">
    <label class="form-head" for="">タイトル</label>
    <div><input class="form-input" type="text" name="title" placeholder="15文字以内" value="<?php echo $title ?>"></div>
  </div>
  <div class="form-content">
    <label class="form-head" for="">本文</label>
    <div><textarea class="form-textarea" name="content" placeholder="300文字以内"><?php echo $content ?></textarea>
  </div>
  <input class="form-post" name="submit" type="submit" value="投稿"></div>
</form>

<?php for($i = 0; $i < count($posts); $i++): ?>
  <p class="form-head"><?php echo $posts[$i]['title']; ?></p>
  <a  class="form-head form-delete" href="javascript:void(0)" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='delete_post.php?id=<?= $posts[$i]['no']; ?>'">削除</a>
<?php endfor; ?>



<!-- 画像投稿 -->
<form class="form-top" method="post" enctype="multipart/form-data">
  <h3 class="form-title">画像投稿</h3>
  <div>
    <input class="form-file" type="file" name="image" required>
  </div>
  <button class="form-post" name="gallery" type="submit">保存</button>
</form>

<ul class="form-check">
  <?php for($i = 0; $i < count($images); $i++): ?>
    <li class="form-list">
      <img src="image.php?id=<?= $images[$i]['image_id']; ?>" width="100px" height="auto">
      <div class="form-delete">
        <p class="form-text"><?= $images[$i]['image_name']; ?></p>
        <a class="form-text" href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='delete_gallery.php?id=<?= $images[$i]['image_id']; ?>'">削除</a>
      </div>
    </li>
  <?php endfor; ?>
</ul>



<a href="logout_page.php" class="form-login"><button>ログアウト</button></a>



<!-- footer -->
<?php

$path = "../";
include 'footer.php';

?>