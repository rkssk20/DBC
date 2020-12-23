<?php

session_start();
header("Content-type: text/html; charset=utf-8");
header('X-FRAME-OPTIONS: SAMEORIGIN');

require('php/gallery.php');

include('php/header.php');

?>

<!-- hamburger icon -->
<i class="fa fa-bars" id="show"></i>
<div class="menu">
<!-- hamburger close -->
  <i class="fa fa-times" id="hide"></i>
  <ul class="menu-list">
    <li><a class="menu-text" id="link" href="#title-new">更新情報</a></li>
    <li><a class="menu-text" id="link2" href="#title-intro">DBCについて</a></li>
    <li><a class="menu-text" id="link3" href="#title-collabo">活動報告</a></li>
    <li><a class="menu-text" id="link5" href="#title-gallery">ギャラリー</a></li>
    <li><a class="menu-text" id="link4" href="#title-link">リンク</a></li>
    <div class="menu-sns">
      <a target="_blank" href="https://twitter.com/dokkyobc"><img class="menu-icon" src="public/Twitter_Logo_WhiteOnImage.png" alt="Twitter icon"></a>
      <a target="_blank" href="https://www.youtube.com/playlist?list=PLyiGIE07ww42mJwBTOIkZp7FuGieCOElw"><img class="menu-icon" src="public/youtube_social_squircle_dark.png" alt="Twitter icon"></a>
      <a target="_blank" href="https://dokkyobc.blog.fc2.com"><img class="menu-icon" src="public/44433.png" alt="Twitter icon"></a>
    </div>
  </ul>
</div>
</header>

<div id="cover" class=""></div>



<!-- youtube -->
<div class="movie-wrapper">
  <div class="movie">
    <iframe src="https://www.youtube.com/embed/DQBlIPz9EMc?autoplay=1&mute=1&rel=0&loop=1&playlist=DQBlIPz9EMc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>



<!-- 更新情報 -->
<div>
  <p id="title-new">更新情報</p>
  <div class="swiper-container swiper1">
    <div class="swiper-wrapper">
      <!-- blogテーブルから描画 -->
      <?php require 'php/blog.php'; foreach ($posts as $post) { ?>
        <div class="post swiper-slide content-sub">
          <p class="post-new">New</p>

          <!-- URLなし=サイト内、あり=リンク -->
          <?php if($post['url'] == null): ?>
          <a href="php/newpost.php" class="swiper-link">
          <?php else: ?>
          <a href="<?php echo $post['url'] ?>" target="_blank" class="swiper-link">
          <?php endif; ?>
          <h1 class="post-title"><?php echo $post['title'] ?></h1>
          </a>

          <p class="post-content"><?php echo mb_strimwidth($post['content'],0,80,"…") ?></p>

          <!-- URLのYouTube,Blog判定 -->
          <?php if(strstr($post['url'],'youtube.com')): ?>
          <p class="post-youtube">YouTube</p>
          <?php elseif(strstr($post['url'],'dokkyobc.blog.fc2.com')): ?>
          <p class="post-blog">Blog</p>
          <?php else: ?>
          <p class="post-news">News</p>
          <?php endif; ?>

          <p class="post-time"><?php echo substr($post['time'],0,10) ?></p>
        </div>
      <?php } ?>
    </div>
    <div class="swiper-button-prev prev1"></div>
    <div class="swiper-button-next next1"></div>
	<div class="swiper-pagination"></div>
</div>
</div>



<!-- 獨協大学放送研究会について -->
<div class="contentbox">
  <p id="title-intro">獨協大学放送研究会について</p>
  <div class="swiper-container swiper2">
    <div class="swiper-wrapper">
      <div class="swiper-slide swiper-box">
        <h1 class="swiper-title"><span class="swiper-green">D</span>okkyo <span class="swiper-green">B</span>roadcasting <span class="swiper-green">C</span>lub</h1>
        <div class="swiper-row">
          <div>
            <p id="swiper-text" class="swiper-hidden">獨協大学放送研究会(DBC)は、<br>
            「アナウンス」「声優」「企画・制作」の３分野から<br>
            技術向上のために活動しています。<br>
            <br>
            年に３回行われる番組発表会では、<br>
            音響・照明・装飾まで<br>
            全て自分たちで作り上げます。<br>
            <br>
            各種コンテスト・コンクールへの参加、<br>
            他団体の撮影・編集・司会も行います。</p>
            <div id="more" class="swiper-more">続きを読む</div>
          </div>
          <img class="poster" src="public/poster.png" alt="DBC poste">
        </div>
      </div>
      <div class="swiper-slide swiper-box">
        <h1 class="swiper-title">アナウンスプロダクション</h1>
        <div class="swiper-column">
          <img class="swiper-production" src="public/announce.png" alt="アナプロ イメージ">
          <p>
            朗読やナレーション、ラジオDJの制作をしています！<br>
            入学式や卒業式、スピーチコンテストの司会も行います。
          </p>
        </div>
      </div>
      <div class="swiper-slide swiper-box">
        <h1 class="swiper-title">声優プロダクション</h1>
        <div class="swiper-column">
          <img class="swiper-production" src="public/voice.png" alt="声優 イメージ">
          <p>
            主に声を使った演技を行います。発生練習などの基礎から行うので、<br>
            演技をやったことがない人でも気軽に始めることができます！
          </p>
        </div>
      </div>
      <div class="swiper-slide swiper-box">
        <h1 class="swiper-title">企画・制作プロダクション</h1>
        <div class="swiper-column">
          <img class="swiper-production" src="public/kisei.png" alt="企制 イメージ">
          <p>
            バラエティやMVなどの映像を、企画・撮影・編集します。<br>
            また、他団体のCMやイベントの撮影・編集も担当します。
          </p>
        </div>
      </div>
    </div>
    <div class="swiper-button-prev prev2"></div>
    <div id="next" class="swiper-button-next next2"></div>
  </div>
</div>



<!-- 活動報告 -->
<div class="contentbox">
  <p id="title-collabo">活動報告</p>
  <div class="collabo-head">
    <h1 class="collabo-title">LUNCH POEMS@DOKKYO</h1>
    <h1 class="collabo-slash">/</h1>
    <h1 class="collabo-time">2016.11.25 〜</h1>
  </div>
  <div class="collabo-text">
    <p>獨協大学外国語学部英語学科主催の<br>ポエトリーリーディングイベントです。<br>撮影・編集をさせていただきました。</p>
    <a target="_blank" href="https://www.youtube.com/channel/UCfYlD2rwf1VY2nLhdJNe8rg/featured"><img class="collabo-icon" src="public/youtube_social_icon_red.png" alt="youtube link"></a>
  </div>
  <div class="collabo-head">
    <h1 class="collabo-title">わいわいロードフェスティバル</h1>
    <h1 class="collabo-slash">/</h1>
    <h1 class="collabo-time">2017.12.23</h1>
  </div>
  <div class="collabo-text">
    <p>わいわいウィンターウィンドフェスティバル<br>＠草加市わいわいロード商店街<br>撮影・編集をさせていただきました。</p>
    <a target="_blank" href="https://www.youtube.com/channel/UCmEIEzl-hCIhtPXu71NGnrw"><img class="collabo-icon" src="public/youtube_social_icon_red.png" alt="youtube link"></a>
  </div>
  <div class="collabo-head">
    <h1 class="collabo-title">次世代ワクワクミュージックパーティー</h1>
    <h1 class="collabo-slash">/</h1>
    <h1 class="collabo-time">2018.8.21</h1>
  </div>
  <div class="collabo-text">
    <p>タワーレコード渋谷店で行われた、<br>ワンダフルドーナッツさんの<br>ライブを撮影させれていただきました。</p>
    <a target="_blank" href="https://www.youtube.com/watch?v=95yH085KsLM"><img class="collabo-icon" src="public/youtube_social_icon_red.png" alt="youtube link"></a>
  </div>
</div>



<!-- ギャラリー -->
<div class="contentbox">
  <p id="title-gallery">ギャラリー</p>
	<div class="swiper-container swiper3">
		<div class="swiper-wrapper">
      <?php for($i = 0; $i < count($images); $i++): ?>
        <div class="swiper-slide">
          <a data-toggle="modal" data-slide-to="<?= $i; ?>">
            <img class="gallery-main" src="php/image.php?id=<?= $images[$i]['image_id']; ?>">
          </a>
        </div>
      <?php endfor; ?>
    </div>
		<div class="swiper-button-prev prev3"></div>
		<div class="swiper-button-next next3"></div>
	</div>

	<div class="swiper-container slider-thumbnail slide-sub">
		<div class="swiper-wrapper">
      <?php for($i = 0; $i < count($images); $i++): ?>
        <div class="swiper-slide">
          <a data-toggle="modal" data-slide-to="<?= $i; ?>">
            <img class="gallery-sub" src="php/image.php?id=<?= $images[$i]['image_id']; ?>">
          </a>
        </div>
      <?php endfor; ?>
		</div>
	</div>
</div>



<!-- リンク -->
<div class="contentbox">
  <p id="title-link">リンク</p>
  <div class="link-box">
    <h1 class="link-title">YouTube</h1>
    <div class="link-content">
      <p class="link-text">雄飛祭や部活紹介をまとめた<br>
      再生リストです。</p>
      <a target="_blank" href="https://www.youtube.com/playlist?list=PLyiGIE07ww42mJwBTOIkZp7FuGieCOElw"><img class="collabo-icon" src="public/youtube_social_icon_red.png" alt="youtube link"></a>
    </div>
  </div>
  <div class="link-box">
    <h1 class="link-title">Blog</h1>
    <div class="link-content">
      <p class="link-text">発表会の進捗状況などを<br>
      更新していきます。</p>
      <a target="_blank" href="https://dokkyobc.blog.fc2.com"><img class="blog-icon" src="public/44433.png" alt="blog icon"></a>
    </div>
  </div>
  <div class="link-box">
    <h1 class="link-title">お問い合わせ</h1>
    <div class="link-content">
      <p class="link-text">部活へのご質問や、撮影・司会協力等のご依頼は<br>メール（dbc2020.hp@gmail.com）<br>またはTwitterのダイレクトメールからお願いします。</p>
    </div>
    <a class="twitter-timeline" data-chrome=”noheader,nofooter” data-theme="light" href="https://twitter.com/dokkyobc?ref_src=twsrc%5Etfw">Tweets by dokkyobc</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>
</div>

<a href="php/member.php" id="title-login"><button>管理者ログイン</button></a>



<!-- footer -->
<?php

include('php/footer.php');

?>