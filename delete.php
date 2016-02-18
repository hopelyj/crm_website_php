<?php
header('Content-type: text/html; charset=utf-8');
$config = require './config.php';
require './PDODB.class.php';
$_dao = PDODB::getInstance($config['db']);
$id = $_POST['id'];
if(isset($id)){
    $sql = "delete from dos_webinfo where Id=$id";
    $result = $_dao->query($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}