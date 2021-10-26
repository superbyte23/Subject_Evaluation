<?php 

require_once '../config/connection.php'; 
require_once '../Model/Grades.php';
$db = new Connection;
$grade = new Grade($db);

