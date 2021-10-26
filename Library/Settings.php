<?php 

require_once '../config/connection.php'; 
require_once '../Model/Settings.php';
$db = new Connection;
$settings = new Settings($db);

$semesters = $settings->show_semester();

 