<?php

$path = "../";
include 'header.php';

// session_start();

// 元々セッションのあった人にはログアウトのメッセージ
// そうでない(セッションが切れている)人にはタイムアウトのメッセージ
if(isset($_SESSION['USER'])){
  $errorMessage = 'ログアウトしました';
}else{
  $errorMessage = 'セッションがタイムアウトしました';
}

// セッションの変数のクリア
$_SESSION = array();

// セッションのクリア
@session_destroy();
?>

</header>

<div>
</div>
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