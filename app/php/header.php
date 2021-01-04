<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>【DBC】獨協大学放送研究会</title>
    <meta name="description" content="獨協大学放送研究会のWebサイト。新歓・活動情報を更新中！">
    <!-- echo $pathで、このphpを読み込むときに$path = '../'が設定してあればファイルの階層を示すことができる。 -->
    <link rel="DBC icon" href="<?php echo $path; ?>public/icon.png">
    <link rel="stylesheet" href="<?php echo $path; ?>index.css">
    <!-- hamburger icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- スムーススクロール -->
    <script>
      $(function(){
        // #で始まるリンクをクリックで実行
        $('a[href^="#"]').click(function(){
          var speed = 500;
          // 出発地点hrefの値をattrで取得。
          var href= $(this).attr("href");
          // 取得したhrefが#または(||)""であれば(?)htmlへのリンク(ページトップ)、そうでなければhrefの中身が到着地点になる
          var target = $(href == "#" || href == "" ? 'html' : href);
          // targetに設定した地点のtop位置をofsetで取得
          var position = target.offset().top;
          // animateでpositionmで設定した場所まで動かす。動き方はswingかlinear
          $("html, body").animate({scrollTop:position}, speed, "swing");
          // urlにIDタグが付くのを防ぐ
          return false;
        });
      });
    </script>
  </head>

  <body>
    <div class="wrap">
      <!-- header -->
      <header class="" id="header">
        <a class="title-link" href="<?php echo $path; ?>index.php"><img class="title-img" src="<?php echo $path; ?>public/title.png" alt="title icon"></a>