<?php
	header('Content-type: text/html; charset=utf-8');

	$config = require './config.php';
	require './PDODB.class.php';
	$_dao = PDODB::getInstance($config['db']);
	if(isset($_POST['BackAddress'])){
		$_backAddress = $_POST['BackAddress'];
		$_backAccount = $_POST['BackAccount'];
		$_backPwd = $_POST['BackPassword'];
		$_FTPAddress = $_POST['FTPAddress'];
		$_FTPAccount = $_POST['FTPAccount'];
		$_FTPPwd = $_POST['FTPPassword'];
		$id = $_POST['Id'];
		$sql = "update dos_webinfo set BackAddress='$_backAddress',BackAccount='$_backAccount',BackPassword='$_backPwd',FTPAddress='$_FTPAddress',FTPAccount='$_FTPAccount',FTPPassword='$_FTPPwd' where Id=$id";
		$result = $_dao->query($sql);
		if($result){
			header("Location:./index.php");
		}else{
			header("Refresh:3;URL:./index.php");
			echo "出错;请联系管理员";
		}
	}
	else{
		$id = $_GET['id'];
		$sql = "select * from dos_webinfo where Id=$id";
		$row = $_dao->getRow($sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>管理首页</title>
    <link href="//cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link href="./css/pagerstyles.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-theme.min.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="#">内容管理</a>
                <div class="nav-collapse collapse">
                    <p class="navbar-text pull-right">
                        Logged in as <a href="#" class="navbar-link">Admin</a>
                    </p>
                    <ul class="nav">
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header">用户管理</li>
                        <li class="active"><a href="#">用户信息</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
            	<form class="form-horizontal" action="./modify.php" method="POST" >
                    <legend>用户信息</legend>
                        <div class="control-group">
                            <label class="control-label">后台地址</label>
                            <div class="controls">
                            	<input type="hidden" name="Id" value="<?php echo ($row["Id"])?>" />
                                <input type="text" name="BackAddress" value="<?php echo($row["BackAddress"]);?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">后台账户</label>
                            <div class="controls">
                                <input type="text" name="BackAccount" value="<?php echo($row["BackAccount"]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">后台密码</label>
                            <div class="controls">
                                <input type="text" name="BackPassword" value="<?php echo($row["BackPassword"]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">FTP地址</label>
                            <div class="controls">
                                <input type="text" name="FTPAddress" value="<?php echo($row["FTPAddress"]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">FTP账户</label>
                            <div class="controls">
                                <input type="text" name="FTPAccount" value="<?php echo($row["FTPAccount"]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">FTP密码</label>
                            <div class="controls">
                                <input type="text" name="FTPPassword" value="<?php echo($row["FTPPassword"]);?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-info">更新</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="span9">
            </div>
        </div><!--/row-->
        
    </div>
</body>
</html>


