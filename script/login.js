$(function() {
    $(".safe,.user").bind('click', function(e) {
        var $current = e.target;
        if ($($current).hasClass("safe")) {
            $($current).addClass("active");
            $(".bottom_block").animate({
                left: "0px"
            }, 100);
            $(".user").removeClass("active");
            $(".safeBox").addClass("show").removeClass("hide");
            $(".userBox").addClass("hide").removeClass("show");
        } else {
            $($current).addClass("active");
            $(".bottom_block").animate({
                left: "135px"
            }, 100);
            $(".safe").removeClass("active");
            $(".safeBox").addClass("hide").removeClass("show");
            $(".userBox").addClass("show").removeClass("hide");
        }
    });
    $(".jiantou").click(function() {
        var $other = $(".ohterLogin a");
        if ($other.size() == 6) {
            $other[2].remove();
            $other[3].remove();
            $other[4].remove();
            $(this).css("background-position", "-18px center")
        } else {
            var html = '<a href="#" class="qihu"></a><a href="#" class="unk"></a><a href="#" class="baidu"></a>';
            $(this).before(html);
            $(this).css("background-position", "-30px center")
        }
    });
    $(".genImg").hover(function() {
        $('.saoyisao').toggle();
    });

    // 登录
    $(".loginBtn").click(function(e) {
        var $user = $(".userTxt");
        var $pass = $(".passBox");
        if ($user.val() == "") {
            $(".errorPass").css('display', 'none');
            $(".errorUser").css('display', 'block');
        } else if ($pass.val() == "") {
            $(".errorUser").css('display', 'none');
            $(".errorPass").css('display', 'block');
        } else {
            var userName = $user.val();
            var passWord = $pass.val();
            $.ajax({
                type: "GET",
                url: "login.php",
                data: {
                    user: userName,
                    pass: passWord
                },
                success: function(data, status) {
                    if (data == "[]") {
                        alert("用户名或密码有误！")
                    } else {
                        var json = JSON.parse(data);
                        var name = encodeURIComponent(json[0].userName);
                        window.location.href = "index.html";
                        setCookie('userName', name);
                        // document.cookie='userName='+encodeURIComponent("索尼中国");
                    }
                }
            })
        }
    });
    $(".userTxt,.passBox").blur(function(e) {
        var $current = e.target;
        if ($($current).val() != "") {
            $(".errorUser").css('display', 'none');
            $(".errorPass").css('display', 'none');
        }
    });

    // 设置cookie函数
    function setCookie(name, value, expires, path, domain, secure) {
        var cookieName = encodeURIComponent(name) + '=' + encodeURIComponent(value);
        if (expires instanceof Date) {
            cookieName += ';expires' + expires;
        }
        if (path) {
            cookieName += ';path' + path;
        }
        if (domain) {
            cookieName += ';domain' + domain;
        }
        if (secure) {
            cookieName += ';secure';
        }
        document.cookie = cookieName;
    }
    // 过期时间
    // 传递一个天数，指定天数后失效
    function setCookieDate(day) {
        var date = null;
        if (typeof day == 'number' && day > 0) {
            date = new Date();
            date.setDate(date.getDate() + day);
        } else {
            throw new Error("传递的天数有误")
        }
        return date;
    }
});
