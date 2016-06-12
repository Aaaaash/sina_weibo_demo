<?php
        require_once('config.php');
        $userName=$_GET['userName'];
        $query = mysql_query("SELECT userName,otherName,info,follow,fans,weibo FROM userInfo WHERE userName='$userName'") or die('SQL错误！');
        $json = '';
	while (!!$row = mysql_fetch_array($query, MYSQL_ASSOC)) {
		$json .= json_encode($row).',';
	}
	echo '['.substr($json, 0 , strlen($json) - 1).']';
?>
