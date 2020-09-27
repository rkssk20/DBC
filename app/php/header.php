<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>【DBC】獨協大学放送研究会</title>
    <meta name="description" content="獨協大学放送研究会のWebサイト。新歓・活動情報を更新中！">
    <link rel="DBC icon" href="<?php echo $path; ?>public/icon.png">
    <link rel="stylesheet" href="<?php echo $path; ?>index.css">
    <!-- hamburger icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <!-- スムーススクロール -->
    <script>
      $(function(){
        $('a[href^="#"]').click(function(){
          var speed = 500;
          var href= $(this).attr("href");
          var target = $(href == "#" || href == "" ? 'html' : href);
          var position = target.offset().top;
          $("html, body").animate({scrollTop:position}, speed, "swing");
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