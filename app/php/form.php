<?php

require('gallery.php');

$path = "../";
include('header.php');

?>

</header>



<!-- 記事投稿 -->
<form class="form-top" method="post" action="post.php">
  <h3>記事投稿</h3>
  <p>タイトル</p>
  <p><input class="form-input" type="text" name="title" placeholder="30文字以内" value="<?php echo $title ?>"></p>
  <p>本文</p>
  <p><textarea class="form-textarea" name="content" placeholder="300文字以内"><?php echo $content ?></textarea></p>
  <p><input name="submit" type="submit" value="投稿"></p>
  <font color="#ff0000"><?php echo $error ?></font>
</form>



<!-- 画像投稿 -->
<form class="form-top" method="post" enctype="multipart/form-data">
  <h3>画像投稿</h3>
  <div>
    <input type="file" name="image" required>
  </div>
  <button class="form-keep" type="submit">保存</button>
</form>

<ul class="form-check">
  <?php for($i = 0; $i < count($images); $i++): ?>
    <li class="form-list">
      <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
        <img src="image.php?id=<?= $images[$i]['image_id']; ?>" width="100px" height="auto">
      </a>
      <div class="form-delete">
        <p><?= $images[$i]['image_name']; ?> (<?= number_format($images[$i]['image_size']/1000, 2); ?> KB)</p>
        <a href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='delete.php?id=<?= $images[$i]['image_id']; ?>'">削除</a>
      </div>
    </li>
  <?php endfor; ?>
</ul>



<!-- footer -->
<?php

$path = "../";
include('footer.php');

?>