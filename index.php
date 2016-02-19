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
    <script>
        function deleteInfo(id){
            if(window.confirm('确认删除吗?')){
               $.post('./delete.php',{id:id},function(res){
                    window.location = './index.php';
            }); 
            }
            
        }
    </script>
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

                        <!--<li class="divider"></li>
                        <li class="nav-header">广告管理</li>
                        <li><a href="#">Link</a></li>
                        <li class="divider"></li>

                        <li class="nav-header">文章管理</li>
                        <li><a href="#">Link</a></li>-->
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
            	<?php
            		require_once './user_list.php';
            	?>
            </div>
            <div class="span9">
                <div class="text-center pagination">
                    <?php
                        $page = require './pagination.php';
                        echo $page;
                    ?>
                </div>
            </div>
        </div><!--/row-->
        
    </div>
    
    

</body>
</html>
