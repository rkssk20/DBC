<?php
  
  require 'db.php' ;

  $st = $pdo->query("SELECT * FROM post ORDER BY time DESC");
  $posts = $st->fetchAll();
?>