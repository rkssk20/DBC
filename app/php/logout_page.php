<?php

session_start();

$path = "../";
include 'header.php';

if(isset($_SESSION['USER'])){
  $errorMessage = 'ログアウトしました';
}else{
  $errorMessage = 'セッションがタイムアウトしました';
}

$_SESSION = array();

@session_destroy();
?>

</header>

<div class="logout">
  <h3 class="logout-title">ログアウト</h3>
  
  <p class="logout-error">
    <?php

    echo htmlspecialchars($errorMessage, ENT_QUOTES);

    ?>
  </p>
  
  <a class="logout-text" href="login_page.php">管理者ログインに戻る</a>
</div>



<!-- footer -->
<?php

$path = "../";
include 'footer.php';

?>