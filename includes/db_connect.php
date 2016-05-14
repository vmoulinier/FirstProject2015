<?php

$bdd = new PDO('mysql:host=localhost;dbname=zesteetpoomenu;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include_once 'class.user.php';
include_once 'class.manager.php';
$manager = new Manager($bdd);
