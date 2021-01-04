<?php
  
  require 'db.php' ;

  // timeをDESCで降順
  $st = $pdo->query("SELECT * FROM post ORDER BY time DESC");
  $posts = $st->fetchAll();
?>