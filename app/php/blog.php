<?php
  
  require 'db.php' ;

  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>