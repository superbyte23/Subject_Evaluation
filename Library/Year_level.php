<?php 

require_once '../config/connection.php'; 
require_once '../Model/Year_level.php';
$db = new Connection;
$yearlevel = new Year_level($db);

$yearlevel_list = $yearlevel->list_Level();

 