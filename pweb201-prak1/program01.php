<?php
  $guestName = $_GET['guest'];
  $today = date('l');
  $todayDate = date('l, F jS Y');
  $backgroundColor = $_GET['color'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Belajar PHP</title>
  </head>
  <body bgcolor=<?= $backgroundColor ?> >
    <h1>Program 01</h1>
    today is: <?= $todayDate ?>
    <hr>
    <h2>Hello, <?= $guestName ?></h2>
    <h3>Happy <?= $today ?></h3>
  </body>
</html>
