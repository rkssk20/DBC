<?php

include('login.php');

$path = "../";
include('header.php');

?>

</header>



<form id="form" class="login" action="" method="POST">
  <h3>管理者ログイン</h3>

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



<!-- footer -->
<?php

$path = "../";
include('footer.php');

?>