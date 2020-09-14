<?php

session_start();
header("Content-type: text/html; charset=utf-8");
header('X-FRAME-OPTIONS: SAMEORIGIN');

include('php/login.php');
include('php/header.php');

?>

<!-- hamburger icon -->
<i class="fa fa-bars" id="show"></i>
<div class="menu">
<!-- hamburger close -->
  <i class="fa fa-times" id="hide"></i>
  <ul class="menu-list">
    <li class="menu-text">更新情報</li>
    <li class="menu-text">DBCについて</li>
    <li class="menu-text">活動</li>
    <li class="menu-text">リンク</li>
    <li class="menu-text">お問い合わせ</li>
  </ul>
</div>
</header>

<div id="cover"></div>

<!-- youtube -->
<div class="movie">
  <iframe src="https://www.youtube.com/embed/DQBlIPz9EMc?autoplay=1&mute=1&rel=0&loop=1&playlist=DQBlIPz9EMc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<p>更新情報</p>

<div class="box"></div>

<!-- open login -->
<a id="login">▼ 管理者ログイン</a>
<form id="form" class="login-open" action="" method="POST">
  <font color="#ff0000">
    <?php

    echo htmlspecialchars($errorMessage, ENT_QUOTES);

    ?>
  </font>
  <div class="login-content">
    <label for="signup-id">ユーザー名</label>
    <div><input type="text" name="username" id="signup-id"></div>
  </div>
  <div class="login-content">
    <label for="signup-pass">パスワード</label>
    <div><input type="password" name="password" id="signup-pass"></div>
  </div>
  <div><input class="login-button" type="submit" name="login" value="ログイン"></div>
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p>お問い合わせ</p>
<p class="contact">
  部活へのご質問や、撮影・司会協力のご依頼等は<br>
  下記のメールフォームまたはTwitterのダイレクトメールからお願いします。
</p>

<form class="mail" action="php/mail.php" method="post">
  <p>名前:</p>
  <input class="mail-name" type="text" name="name">
  <p>メールアドレス:</p>
  <input class="mail-name" type="email" name="mail">
  <p>お問い合わせ内容:</p>
  <textarea class="mail-text" type="text" name="comment" rows="5"></textarea>
  
  <input type="hidden" name="token" value="<?=sha1(session_id())?>">
  <input type="submit" value="送信">
</form>


<!-- footer -->
<?php

include('php/footer.php');

?>