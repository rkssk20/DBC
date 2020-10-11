<?php
  $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','mysql_dbc','password');
  $st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
  $posts = $st->fetchAll();
?>