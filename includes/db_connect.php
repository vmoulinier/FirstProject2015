<?php

$bdd = new PDO('mysql:host=localhost;dbname=zesteetpoomenu;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include_once 'user.php';
include_once 'manager.php';
$manager = new Manager($bdd);



