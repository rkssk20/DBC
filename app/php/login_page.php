<?php

include 'login.php';

$path = "../";
include 'header.php';

?>

</header>



<div class="login-wrapper">
  <form class="login" id="form" action="" method="POST">
    <h1 class="login-title">管理者ログイン</h1>

    <font color="#ff0000">
      <?php

      echo htmlspecialchars($errorMessage, ENT_QUOTES);

      ?>
    </font>

    <div class="login-content">
      <label class="login-head" for="signup-id">ユーザー名</label>
      <div><input class="login-input" type="text" name="user" id="signup-id" size="15"></div>
    </div>

    <div class="login-content">
      <label class="login-head" for="signup-pass">パスワード</label>
      <div><input class="login-input" type="password" name="pass" id="signup-pass" size="15"></div>
    </div>
    
    <div><input class="login-button" type="submit" name="submit" value="ログイン"></div>
  </form>
</div>



<!-- footer -->
<?php

$path = "../";
include 'footer.php';

?>