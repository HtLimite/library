<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>图书系统</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="/index/images/lb.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/student/css/spop.min.css"/>
    <link rel="stylesheet" href="/index/css/normalize.css">
    {{--    <link rel="stylesheet" href="/index/css/font-awesome.css">--}}
    <link rel="stylesheet" href="/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="/index/css/bootstrap.min.css">
    <link rel="stylesheet" href="/index/css/templatemo-style.css">

    {{--    悬浮提示信息--}}
    <link rel="stylesheet" href="/index/css/test.css">
    <script src="/student/js/jquery-3.2.1.min.js"></script>
    <script src="/index/js/test.js" type="text/javascript"></script>

    {{--    //管理员登录弹窗--}}
<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" /> -->
    {{--    <link rel="stylesheet" type="text/css" href="/adminlogin/css/demo.css"/>--}}
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/content.css"/>
    <script src="/adminlogin/js/modernizr.custom.js"></script>

    <!--    seat style-->
    <link rel="stylesheet" href="/seat/lunbo/style.css">
    <link rel="stylesheet" href="/seat/style/style.css">

<!--搜索-->
    <link rel="stylesheet" href="/seat/search/css/search-form.css">





    <script src="/index/js/vendor/modernizr-2.6.2.min.js"></script>

</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="site-bg"></div>
<div class="site-bg-overlay"></div>

<!-- TOP HEADER -->
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                {{--                <p class="phone-info" id="adminLogin">图书馆系统--}}
                {{--                    <a  href="javascript:" onclick="adminL();" style="margin-left: 20px;"><i class="fa-solid fa-user-lock"></i>--}}
                {{--                        Reiki</a>--}}
                {{--                </p>                --}}
                <div class="phone-info" id="adminLogin"><span>图书馆系统</span>

                    <div id="adminL" onclick="adminL();"
                         style="margin-left: 23px; display: inline-flex; align-items: center; height: 18.5px;cursor:pointer">
                        <i class="fa-solid fa-user-lock"></i>
                        <div>&nbsp;&nbsp;Reiki</div>
                    </div>
                    <div style=" width: 0; height:0;position: absolute;top: 0; left: 116px;">
                        <div class="mockup-content">
                            <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                                <button type="button" id="adminButton" style="opacity: 0;">
                                    Login
                                </button>
                                <div class="morph-content" style="background: #5b938b;">
                                    <div>
                                        <div class="content-style-form content-style-form-1">
                                            <span class="icon icon-close">Close the dialog</span>
                                            <h2 style="font-size: 37px;">管理员</h2>
                                            <form>
                                                <p style="position: relative"><label> <i
                                                            class="fa-solid fa-user"></i></label><input type="text"/>
                                                </p>
                                                <p style="position: relative"><label><i
                                                            class="fa-solid fa-lock"></i></label><input
                                                        type="password"/></p>
                                                <p>
                                                    <button>登录</button>
                                                </p>
                                                <p>
                                                    <button>忘记密码?</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="social-icons">
                    <ul>
                        <li>
                            {{--                            <a href="#" class="fa fa-facebook"></a>--}}
                            <a href="#" class="fa-brands fa-facebook-f"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-twitter"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-linkedin"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-dribbble"></a>
                        </li>
                        @if(session()->has('email'))
                            <li>
                                <a href="/exit" id="exitLogin" class="fa-solid fa-arrow-right-from-bracket"></a>
                            </li>
                        @else
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .top-header -->

<div class="visible-xs visible-sm responsive-menu">
    <a href="#" class="toggle-menu">
        <i class="fa fa-bars"></i> Show Menu
    </a>
    <div class="show-menu">
        <ul class="main-menu">
            <li>
                <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>首页</a>
            </li>
            <li>
                <a class="show-2 aboutbutton" href="#"><i class="fa fa-user"></i>我的</a>
            </li>
            <li>
                <a class="show-3 projectbutton" href="#"><i class="fa-solid fa-swatchbook"></i>预约</a>
            </li>
            <li>
                <a class="show-5 contactbutton" href="#"><i class="fa fa-envelope"></i>认证</a>
            </li>
        </ul>
    </div>
</div>
<div class="copyrights">Collect from <a href="https://www.webmoban.net">免费模板</a></div>
<div class="container" id="page-content" style="min-height: 100vh;">
    <div class="row">


        <div class="col-md-9 col-sm-12 content-holder" style="transition: all 1s;">
            <!-- CONTENT -->
            <div id="menu-container">

                <div class="logo-holder logo-top-margin">
                    <a href="javascript:;" class="site-brand"><img onclick="logo();" id="myInfo"
                                                                   src="/index/images/logo.png" alt=""
                                                                   style="height: 100px;width: 100px;"></a>
                </div>


                <div id="menu-1" class="homepage home-section text-center">
                    <div class="welcome-text">
                        <h2>你好, 欢迎来到<strong>图书馆</strong></h2>
                        <p>Rectangle is free mobile template brought to you by <span class="orange">template</span><span
                                class="green">mo</span>.com website. You can download, edit and use this layout for any
                            purpose. Please tell your friends about our
                            website. Thank you.</p>
                        @if(!session()->has('email'))
                            <script> var statu = false;</script>

                            <form id="logForm" onsubmit="return false;" class="subscribe-form">
                                @csrf
                                <div class="row">
                                    <fieldset class="col-md-offset-2 col-md-6">
                                        <input name="QQemail" type="email" class="email" id="subscribe-email"
                                               placeholder="QQ Email" required maxlength="17">
                                    </fieldset>
                                    <fieldset class="col-md-4 button-holder">
                                        <input name="submit" type="submit" readonly onclick="QQenrol(this);"
                                               class="button default tada" id="submit"
                                               value="登录"></input>
                                    </fieldset>
                                </div>
                                <p class="subscribe-text">请输入您的QQ邮箱登录,若没有账号则为<strong>注册!</strong></p>
                            </form>
                        @else
                            <script> var statu = true;</script>
                        @endif

                    </div>
                </div>

                <div id="menu-2" class="content about-section">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="box-content profile">
                                <h3 class="widget-title">Learn 我的</h3>
                                <div class="profile-thumb">
                                    <img src="/index/images/8.jpg" alt="">
                                </div>
                                <div class="profile-content">
                                    <h5 class="profile-name">Linda Beauty</h5>
                                    <span class="profile-role">Creative Director</span>
                                    <p>Most of the /index/images are from <a rel="nofollow" href="#">Unsplash.com</a>
                                        website.
                                        Curabitur auctor justo pretium purus varius sagittis. Aliquam porttitor leo
                                        sapien, hendrerit dapibus lorem.<br><br> Change icons
                                        by <a rel="nofollow" href="#/font-awesome-icon-world-map/">Font Awesome</a>
                                        (version 4). Example: <span class="blue">&lt;i class=&quot;fa fa-refresh&quot;&gt;&lt;/i&gt;</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="box-content">
                                <h3 class="widget-title">Background</h3>
                                <p>Vestibulum pellentesque ante sit amet tristique hendrerit. Sed consequat, nunc
                                    lobortis faucibus pretium, enim nibh blandit est, nec sollicitudin est quam a neque.
                                    Aenean eget malesuada justo.</p>
                                <div class="about-social">
                                    <ul>
                                        <li>
                                            <a href="#" class="fa fa-facebook"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-twitter"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-linkedin"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-dribbble"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="box-content">
                                <h3 class="widget-title">Our Studio</h3>
                                <div class="project-item">
                                    <img src="/index/images/7.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Great Nature Capture</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="box-content">
                                <h3 class="widget-title">Our Technical Skills</h3>
                                <ul class="progess-bars">
                                    <li>
                                        <span>HTML CSS 80%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>PHOTOSHOP 95%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="95"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>WORDPRESS 70%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>PHP mySQL 50%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="menu-3" class="content gallery-section">

                    <div class="box-content" id="seatInfo">
                        <!--导航菜单-->
                        <div class="seatDiv" id="seatNav">
                            <div><h3 class="widget-title"><i class="fa-solid fa-table "></i> 座位信息</h3>
                            </div>
                            <div class="seatNav">
                                <ul>
                                    <li class="searchLi">
                                        <form onsubmit="return false;" class="searchForm">
                                            <div class="search-wrapper">
                                                <div class="input-holder">
                                                    <input type="text" class="search-input" placeholder="Type to search" />
                                                    <button  id="searchI" class="search-icon" onclick="searchToggle(this, event);">
                                                        <span style="display: none;">
                                                        </span>
                                                        <i style="font-size: 21px" class="fa-solid fa-magnifying-glass"></i>
                                                    </button>
                                                </div>
                                                <span class="close" onclick="searchToggle(this, event);"></span>
                                                <div class="result-container">
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                    <li id="seatType"><i class="fa-solid fa-list-ul"></i></li>
                                    <li><i class="fa-solid fa-sitemap"></i></li>
                                    <li><i class="fa-regular fa-calendar-check"></i></li>
                                    <li><i  class="fa-solid fa-book-open"></i></li>
                                </ul>
                                <div class="seatType" id="seatType">
                                    <ul>
                                        <li id="weishiyong"><i class="fa-solid fa-square-check"></i> 未使用</li>
                                        <li id="yuyuezhong"><i class="fa-solid fa-arrows-rotate"></i> 预约中...</li>
                                        <li id="yiyuyue"><i class="fa-regular fa-clock"></i> 已预约</li>
                                        <li id="shiyongzhong"><i class="fa-regular fa-circle-xmark"></i> 使用中</li>
                                        <li id="likai" style="border: none"><i class="fa-regular fa-circle-pause"></i>
                                            离开
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row seatRow">
                            <!--vue轮播图-->
                            <div id="app">
                                <div class="box">
                                    <!--<button @click="imgMove">点击</button>-->
                                    <div class="main clearfix" @mouseover="btnOpen" @mouseout="btnHide">
                                        <div class="minMain">
                                            <div class="item" v-for="(item,index) in list" :key="index">
                                                <div class="img-div" v-bind:style="item.div">
                                                    <div class="top-text"><h3 v-text="item.text"></h3></div>
                                                    <img :src="item.imgUrl" v-bind:style="item.style"/>
                                                </div>
                                            </div>
                                            <div class="btnMain" v-show="btnShow">
                                                <div class="left" @click="leftClick">
                                                    <img src="/seat/lunbo/ljiantou.png"/>
                                                </div>
                                                <div class="right" @click="rightClick">
                                                    <img src="/seat/lunbo/rjiantou.png"/>
                                                </div>
                                            </div>
                                            <div class="pressMain">
                                                <span v-for="(item,index) in pressList"
                                                      :class="{active:item.isShow}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--座位信息-->
                            <div id="seatOne">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="menu-4" class="content contact-section">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="box-content">
                                <h3 class="widget-title">认证您的图书馆账号</h3>
                                <form class="contact-form" id="enrolForm" onsubmit=" return false;">
                                    <fieldset>
                                        <input name="account" type="text" class="name" id="name" placeholder="学号...">
                                    </fieldset>
                                    <fieldset>
                                        {{--                                        <input name="email" type="email" class="email" id="email" placeholder="QQEmail...">--}}
                                    </fieldset>
                                    <fieldset>
                                        <input name="password" type="password" class="subject" id="subject"
                                               placeholder="密码...">
                                    </fieldset>
                                    <fieldset>
                                        <input name="repassword" type="password" class="subject" id="subject1"
                                               placeholder="重复密码...">
                                    </fieldset>
                                    <fieldset>
                                            <textarea name="message" id="message" cols="30" rows="4"
                                                      placeholder="Message.."></textarea>
                                    </fieldset>
                                    <fieldset>
                                        <input type="submit" class="button" onclick="enrol(this);" id="button"
                                               value="认证账号">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="box-content">
                                <h3 class="widget-title">Stay In Touch</h3>
                                <p>Sed ullamcorper, risus a tincidunt efficitur, massa mauris ultricies leo, eu interdum
                                    eros erat non augue. <br><br> Suspendisse ornare sollicitudin lectus non egestas.
                                    Nam fermentum imperdiet ligula congue venenatis.
                                </p>
                                <div class="about-social">
                                    <ul>
                                        <li>
                                            <a href="#" class="fa fa-facebook"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-twitter"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-linkedin"></a>
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-dribbble"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 hidden-sm" id="navhidden" style="transition: all 1s; overflow:hidden;
">

            <nav id="nav" class="main-navigation hidden-xs hidden-sm">
                <ul class="main-menu">
                    <li>
                        <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a id="shouye" class="show-2 aboutbutton" href="#"><i class="fa fa-user"></i>我的</a>
                    </li>
                    <li>
                        <a class="show-3 projectbutton" href="#" onclick="seat();"><i
                                class="fa-solid fa-swatchbook"></i>预约</a>
                    </li>
                    <li>
                        <a class="show-5 contactbutton" href="#"><i class="fa-brands fa-uniregistry"></i>认证</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<!-- SITE-FOOTER -->
<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; Reiki</p>
            </div>
        </div>
    </div>
</div>
<!-- .site-footer -->

{{--<script src="/index/js/vendor/jquery-1.10.2.min.js"></script>--}}
<script src="/js/jquery-3.6.0.js"></script>
<script src="/index/js/plugins.js"></script>
<script src="/index/js/main.js"></script>
<script src="/student/js/spop.min.js"></script>


<!--vue轮播图js-->
<script src="/seat/lunbo/vue.min.2.2.2.js"></script>
<script src="/seat/lunbo/lunbo.js"></script>

<!--座位信息-->
<script src="/seat/my.js"></script>





<script>
    //信息提示弹框
    function message(world, close) {
        spop({
            template: "<h4 class='spop-title'>" + world + "</h4>",
            position: 'top-center',
            //error, info, success, warning
            style: 'warning',
            autoclose: 3000,
            onOpen: function () {
                var second = close;
                var showPop = setInterval(function () {
                    if (second == 0) {
                        clearInterval(showPop);
                    }
                    $('.spop-body').html('<h4 class="spop-title">重置密码成功</h4>即将于' + second + '秒后返回登录');
                    second--;
                }, 1000);
            },
        });
    }

    //判断是否登录
    //调用一次
    window.onload = function () {
        var onece = true;
        if (onece) {
            if (statu) {
                spop({
                    template: '<h4 style="color: #207d59" class="spop-body">欢迎您的登录</h4>',
                    position: 'top-center',
                    style: 'success',
                    autoclose: 1500,
                });

            } else {
                spop({
                    template: '<h4 style="color: #a5fed7" class="spop-body">您未登录</h4>',
                    position: 'top-center',
                    style: 'info',
                    autoclose: 2000,
                });
            }
            onece = false;
        } else {
            return;
        }
    }
    //座位展示
    //监控浏览器屏幕大小
    $(window).resize(function () {
        if ($(window).width() < 992) {
            $(".seatBlock").css("width", "25%");
            $("#navhidden").css("width", "100%");
        } else {
            $(".seatBlock").css("width", "20%");
        }
    });

    //座位展示点击函数

    page(1, true);

    function seat() {
        $("#navhidden").fadeOut("slow");
        $("#navhidden").css("width", "0");

        $(".col-md-9").css("width", "100%");
        $(".seatBlock").css("width", "20%");

        ;

    }

    //LOGO
    function logo() {
        $("#shouye").click();
        $("#navhidden").fadeIn("slow");
        $("#navhidden").css("width", "25%");
        $(".col-md-9").css("width", "75%");
        $(".col-md-4").css("width", "33.33333333%");
    }

    //分页ajax刷新
    function page(pages, bool, status) {
        var bool = bool;
        $.get('/library/1', {'page': pages, 'status': status}, function (data) {
            if (data == 0) {
                spop({
                    template: '<h4 style="color: #a5fed7" class="spop-body">获取座位信息失败!</h4>',
                    position: 'bottom-right',
                    style: 'error',
                    autoclose: 2000,
                });
            } else {
                if (!bool) {
                    spop({
                        template: '<h4 style="color: black" class="spop-body">座位信息已更新!</h4>',
                        position: 'bottom-right',
                        style: 'success',
                        autoclose: 1000,
                    });
                }
                if (status == undefined) {
                    $("#seatOne").html(data);

                } else {
                    $("#dataSeat").html(data);

                }
                // $"#seatDisplay").load(location.href + " #seatDisplay");
            }
        })
    }

</script>
{{--管理员登录弹窗--}}
<script src="/adminlogin/js/classie.js"></script>
<script src="/adminlogin/js/uiMorphingButton_fixed.js"></script>
<script>
    //模板函数
    (function () {
        var docElem = window.document.documentElement,
            didScroll, scrollPosition;

        // trick to prevent scrolling when opening/closing button
        function noScrollFn() {
            window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
        }

        function noScroll() {
            window.removeEventListener('scroll', scrollHandler);
            window.addEventListener('scroll', noScrollFn);
        }

        function scrollFn() {
            window.addEventListener('scroll', scrollHandler);
        }

        function canScroll() {
            window.removeEventListener('scroll', noScrollFn);
            scrollFn();
        }

        function scrollHandler() {
            if (!didScroll) {
                didScroll = true;
                setTimeout(function () {
                    scrollPage();
                }, 60);
            }
        };

        function scrollPage() {
            scrollPosition = {
                x: window.pageXOffset || docElem.scrollLeft,
                y: window.pageYOffset || docElem.scrollTop
            };
            didScroll = false;
        };

        scrollFn();

        [].slice.call(document.querySelectorAll('.morph-button')).forEach(function (bttn) {
            new UIMorphingButton(bttn, {
                closeEl: '.icon-close',
                onBeforeOpen: function () {
                    // don't allow to scroll
                    noScroll();
                },
                onAfterOpen: function () {
                    // can scroll again
                    canScroll();
                },
                onBeforeClose: function () {
                    // don't allow to scroll
                    noScroll();
                },
                onAfterClose: function () {
                    // can scroll again
                    canScroll();
                }
            });
        });

        // for demo purposes only
        [].slice.call(document.querySelectorAll('form button')).forEach(function (bttn) {
            bttn.addEventListener('click', function (ev) {
                ev.preventDefault();
            });
        });
    })();

    //登陆弹窗
    function adminL() {
        document.getElementById("adminButton").click();
    }

    //认证账号ajax
    function enrol(obj) {
        //表单序列化
        var str = $("enrolForm").serialize();
        console.log(obj, str);
    }

    //QQ邮箱登录/注册
    function QQenrol(obj) {

        //获取qq邮箱
        const qqeamil = $("#subscribe-email").val();
        //js验证qq邮箱
        const qqEmail = /[1-9][0-9]{4,}@qq.com/;
        if (qqeamil === "" || !qqEmail.test(qqeamil)) {
            return;
        }
        //ajax
        $.post('/library ', {email: qqeamil, '_token': '{{csrf_token()}}'}, function (data) {
            //注册 2
            if (data == 2) {
                spop({
                    template: '<h4 style="color: #eec50f" class="spop-body">请查收QQ邮箱验证注册 </h4>',
                    position: 'top-left',
                    style: 'success',
                    autoclose: 3000,
                });

            } else if (data == 1) {
                //登录 1
                spop({
                    template: '<h4 style="color: #eec50f" class="spop-body">请查收QQ邮箱验证登录 </h4>',
                    position: 'top-left',
                    style: 'success',
                    autoclose: 3000,
                });
            } else if (data == 3) {
                spop({
                    template: '<h4 style="color: #b85b53" class="spop-body">失败!登录太频繁,请30s后重试 </h4>',
                    position: 'top-left',
                    style: 'warning',
                    autoclose: 3000,
                });
            }
        });
    }


</script>
<!--搜索-->

<script type="text/javascript">
    function searchToggle(obj, evt) {
        obj = obj;
        var container = $(obj).closest('.search-wrapper');
        var value = $(".search-input").val();



        if (!container.hasClass('active')) {
            container.addClass('active');
            evt.preventDefault();

        } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
            container.removeClass('active');
            // clear input
            var text =  container.find('.search-input').val('');
            // clear and hide result container when we press close
            container.find('.result-container').fadeOut(100, function() {
                $(this).empty();
            });

        }

    }
</script>


</body>

</html>
