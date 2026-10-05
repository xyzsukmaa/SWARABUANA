<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=swarabuana;charset=utf8mb4", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
define('PLANTNET_KEY', 'ISI_API_KEY_KALIAN');