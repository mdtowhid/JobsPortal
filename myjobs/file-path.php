<?php

$dbPath1 = 'Classes/database.php';
if(!file_exists($dbPath1)){
    include_once '../Classes/database.php';
}
$businessLogicPath1 = 'Classes/businessLogic.php';

if(!file_exists($businessLogicPath1)){
    include_once '../Classes/businessLogic.php';
}else{
    include_once 'Classes/businessLogic.php';
}

include_once '../Classes/user.php';
include_once '../Classes/admin.php';


?>