<?php
require_once('config.php');
require_once('function.php');
        $txt=stripslashes($_POST['text']);
        // $txt=mysql_real_escape_string(strip_tags($txt),$link);
        $time=time();
        $userid=$_POST['userid'];
        $query=mysql_query("insert into say(userid,content,addtime)values('$userid','$txt','$time')")or die('新增失败！'.mysql_error());;
        // mysql_query($query) or die('新增失败！'.mysql_error());
        echo formatSay($txt,$time,$userid);
?>
