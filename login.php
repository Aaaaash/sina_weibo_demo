<?php
        require_once('config.php');
        $_user=$_GET["user"];
        $_pass=$_GET["pass"];
        $query = mysql_query("SELECT userName,password FROM userinfo WHERE userName='{$_user}' AND password='{$_pass}'") or die('SQL错误！');
        // if (mysql_fetch_array($query, MYSQL_ASSOC)) {		//用户名和密码正确
	// 	echo 0;
	// } else {	//用户名和密码不正确；
	// 	echo 1;
	// }
        $json = '';
        while (!!$row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $json .= json_encode($row).',';
        }
        echo '['.substr($json, 0 , strlen($json) - 1).']';
?>
