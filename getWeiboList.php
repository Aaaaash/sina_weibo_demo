<?php
        require_once('config.php');
        require_once('function.php');
        $query = mysql_query("SELECT userid,content,addtime date FROM say ORDER BY date DESC LIMIT 0,30") or die('SQL错误！');
	$json = '';
	while (!!$row = mysql_fetch_array($query, MYSQL_ASSOC)) {
		$json .= json_encode($row).',';
	}
        sleep(2);
	echo '['.substr($json, 0 , strlen($json) - 1).']';
	mysql_close();
?>
