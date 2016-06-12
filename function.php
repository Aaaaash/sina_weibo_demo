<?php
// <!-- 时间转换函数 -->
function tranTime($time){
        $rtime=date("m-d H:i",$time);
        $htime=date("H:i",$time);
        $time=time()-$time;
        if($time<60){
                $str='刚刚';
        }elseif($time<60*60){
                $str=$min.'分钟前';
        }elseif ($time<60*60*24){
                $h=floor($time/(60*60));
                $str=$h.'小时前'.$htime;
        }elseif($time<60*60*24*3){
                $d=floor($time/(60*60*24));
                if($d==1)
                        $str='昨天'.$rtime;
                else
                        $str='前天'.$rtime;
        }else{
                $str=$rtime;
        }
        return $str;
}
// <!-- 格式化输出函数 -->
function formatSay($say,$dt,$uid){
    $say=htmlspecialchars(stripslashes($say));
    return'<div class="weiboBox">
            <div class="userInfoBox clearfix">
                    <div class="userInfo_sm">
                            <div class="userImg fl" title="'.$uid.'">
                                    <a href="#"><img src="img/userImg2.jpg" alt="" /></a>
                            </div>
                            <div class="Info fl" title="'.$uid.'">
                                    <h3 class="userTit"><a href="#">'.$uid.' <img src="img/vipIcon2.png" alt="" /></a> <img src="img/lv_big.png" alt="" /></h3>
                                    <p class="time"><em>'.tranTime($dt).'</em><em>  来自</em> <em><a href="#">Xperia Z5</a></em></p>
                            </div>
                    </div>
                    <div class="weiboText">
                            <p>
                            '.$say.'
                            </p>
                    </div>
            </div>
            <div class="weiboTool">
                    <ul>
                            <li><a href="#" class="collect iconNum">收藏</a></li>
                            <li><a href="#" class="transportNum iconNum">转发</a></li>
                            <li><a href="#" class="talkNum iconNum">评论</a></li>
                            <li><a href="#" class="goodNum iconNum">赞</a></li>
                    </ul>
            </div>
    </div>
   ';
}

?>
