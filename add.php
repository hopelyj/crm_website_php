<?php

header('Content-type: text/html; charset=utf-8');

$config = require './config.php';
require './PDODB.class.php';
$_dao = PDODB::getInstance($config['db']);

$_backAddress = $_POST['BackAddress'];
$_backAccount = $_POST['BackAccount'];
$_backPwd = $_POST['BackPassword'];
$_FTPAddress = $_POST['FTPAddress'];
$_FTPAccount = $_POST['FTPAccount'];
$_FTPPwd = $_POST['FTPPassword'];

$sql = "insert into dos_webinfo (BackAddress,BackAccount,BackPassword,FTPAccount,FTPAddress,FTPPassword) values ('$_backAddress','$_backAccount','$_backPwd','$_FTPAddress','$_FTPAccount','$_FTPPwd')";
$result = $_dao->query($sql);
if($result){
	header("Location:./index.php");
}