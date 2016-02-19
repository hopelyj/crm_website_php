<?php
$page = isset($_GET['page'])?$_GET['page']:1;
if($page<=0){
    $page = 1;
}
$config = require_once './config.php';
require_once './webinfo.class.php';
$info = new webinfo($config);
$pagination = $info->getPagination($page);

return $pagination;
