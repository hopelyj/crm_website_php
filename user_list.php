
	<a href="./add.html" class="btn btn-success btn-large btn-block " style="margin-bottom:20px;">+新增信息</a>
	<table class="table table-bordered table-hover">
	    <thead>
	        <tr>
	            <th>后台地址</th>
	            <th>账号</th>
	            <th>密码</th>
	            <th>FTP地址</th>
	            <th>FTP账号</th>
	            <th>FTP密码</th>
	            <th>操作</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
    			//获得页码
	    		$page = isset($_GET['page'])?$_GET['page']:1;
	    		$index = ($page -1) * 20;
	    		$config = require './config.php';
	    		require './webinfo.class.php';
	    		$info = new webinfo($config);
	    		$_list = $info->getInfoList($index);
	    		if($_list!=null)
	    		{
	    			foreach ($_list as $row) {
	    				echo "<tr>";
	    					echo "<td>" .$row["BackAddress"] ."</td>";
	    					echo "<td>" .$row["BackAccount"] ."</td>";
	    					echo "<td>" .$row["BackPassword"] ."</td>";
	    					echo "<td>" .$row["FTPAddress"] ."</td>";
	    					echo "<td>" .$row["FTPAccount"] ."</td>";
	    					echo "<td>" .$row["FTPPassword"] ."</td>";
	    					echo "<td><a class='btn btn-info' href='./show.php?id=" .$row["Id"] ."'>详情</a> <a class='btn btn-warning' href='./modify.php?id=" .$row["Id"] ."'>修改</a></td></tr>";
	    			}
	    		}
	    	?>
	    </tbody>
	</table>

