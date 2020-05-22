<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=TP_mini_combat;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$PersonnagesManager = new PersonnagesManager($pdo);

$persos = $PersonnagesManager->all();

?>