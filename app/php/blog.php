<?php
  $pdo = new PDO('mysql:host=mysql_dbc; dbname=blog','root','password');
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>