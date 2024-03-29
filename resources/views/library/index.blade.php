<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>图书系统</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/index/images/lb.jpg">
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
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
    {{--    div在最后--}}
    {{--    //管理员登录弹窗--}}
<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" /> -->
    {{--    <link rel="stylesheet" type="text/css" href="/adminlogin/css/demo.css"/>--}}
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/content.css"/>
    <script src="/adminlogin/js/modernizr.custom.js"></script>

    {{--管理员登录弹窗--}}
    <script src="/adminlogin/js/classie.js"></script>
    <script src="/adminlogin/js/uiMorphingButton_fixed.js"></script>


    <!--    seat style-->
    <link rel="stylesheet" href="/seat/lunbo/style.css">
    <link rel="stylesheet" href="/seat/style/style.css">
    <!-- 时间选择-->
{{--    <link href="/seat/style/index.css" rel="stylesheet">--}}
<!--搜索-->
    <link rel="stylesheet" href="/seat/search/css/search-form.css">

    <!-- css3 svg弹窗-->
{{--    <link rel="stylesheet" type="text/css" href="/seat/style/dialog.css"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="/seat/style/dialog-henry.css"/>--}}
{{--    <script src="/seat/snap.svg-min.js"></script>--}}
{{--    <script src="/seat/modernizr.custom.js"></script>--}}




    <!--时间选择 -->
    <!-- ClockPicker样式表 -->
    <link rel="stylesheet" type="text/css" href="/seat/style/bootstrap-clockpicker.css">
    <script type="text/javascript" src="/seat/bootstrap-clockpicker.js"></script>


    <script src="/index/js/vendor/modernizr-2.6.2.min.js"></script>

</head>


<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="javascript:;">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="site-bg"></div>
<div class="site-bg-overlay"></div>

<!-- TOP HEADER -->
<div class="top-header">
    <div class="container">
        <div class="row" style="display: flex;">
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
                                            <span id="AdminClose" class="icon icon-close">Close the dialog</span>
                                            <h2 style="font-size: 37px;">Admin</h2>
                                            <form onsubmit="return Admin();"  action="/admin/login" method="post" target="_blank" id="AdminForm" >
                                                @csrf
                                                <p style="position: relative"><label> <i class="fa-solid fa-user">  account</i><span id="AdminMessA" style="color: red;float: right;"></span></label>
                                                    <input id="AdminAccount" name="account" autocomplete="off" required type="text"/>
                                                </p>
                                                <p style="position: relative"><label><i class="fa-solid fa-lock">  password</i><span id="AdminMessB" style="color: red;float: right;"></span></label>
                                                    <input id="AdminPassword" name="password" required type="password"/></p>
                                                <p>
                                                    <input id="AdminI" type="submit" style="display: none">
                                                    <button id="AdminB" type="submit" >登录</button>
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
{{--                            <a href="#" class="fa-brands fa-facebook-f"></a>--}}
                        </li>
                        <li>
{{--                            <a href="#" class="fa-solid fa-pen-to-square"></a>--}}
                        </li>
                        <li>
{{--                            <a href="#" class="fa fa-linkedin"></a>--}}
                        </li>
                        <li>
{{--                            <a href="#" class="fa fa-dribbble"></a>--}}
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
@if (session('error'))
    <div class="alert alert-danger" style="position: fixed; top: 0;;z-index: 999">
        {{ session('error') }}
    </div>
    <script>setTimeout(function (){$(".alert-danger").toggle();},3000)</script>
@endif
<!-- .top-header -->


<div class="visible-xs visible-sm responsive-menu">
    <a href="javascript:;" class="toggle-menu">
        <i class="fa fa-bars"></i> 菜单
    </a>
    <div class="show-menu">
        <ul class="main-menu">
            <li>
                <a class="show-1 active homebutton" href="javascript:;"><i class="fa fa-home"></i>首页</a>
            </li>
            <li>
                <a class="show-2 aboutbutton" href="javascript:;"><i class="fa fa-user"></i>我的</a>
            </li>
            <li>
                <a class="show-3 projectbutton" href="javascript:;"><i class="fa-solid fa-swatchbook"></i>预约</a>
            </li>
            <li>
                <a class="show-5 contactbutton" href="javascript:;"><i class="fa fa-envelope"></i>关于</a>
            </li>
        </ul>
    </div>
</div>

<div class="container" id="page-content" style="min-height: 100vh;">
    <div class="row">


        <div class="col-md-9 col-sm-12 content-holder myInfo "  id="oneHun" style="transition: all 1s;">
            <!-- CONTENT -->
            <div id="menu-container">

                <div class="logo-holder logo-top-margin">
                    <a href="javascript:;" class="site-brand"><img onclick="logo();" id="myInfo"
                                                                   src="/index/images/logo.png" alt=""
                                                                   style="height: 100px; width: 100px;"></a>
                </div>


                <div id="menu-1" class="homepage home-section text-center">
                    <div class="welcome-text">
                        <h2>你好, 欢迎来到<strong>图书馆</strong></h2>
                        <p></p>
                        @if(!session()->has('email'))
                            <script> var isLogined = false;</script>

                            <form id="logForm" onsubmit="return false;" class="subscribe-form">
                                @csrf
                                <div class="row">
                                    <fieldset class="col-md-offset-2 col-md-6">
                                        <input name="QQemail" type="email" class="email" id="subscribe-email"
                                               placeholder="Email" required maxlength="30">
                                    </fieldset>
                                    <fieldset class="col-md-4 button-holder">
                                        <input name="submit1" type="submit" readonly onclick="QQenrol(this);"
                                               class="button default tada"
                                               value="登录"/>
                                    </fieldset>
                                </div>
                                <p class="subscribe-text">请输入您的电子邮箱登录,若没有账号则为<strong>注册!</strong></p>
                            </form>
                            <form id="codeN" onsubmit="return false;" style="display: none" class="subscribe-form">
                                @csrf
                                <div class="row">
                                    <fieldset class="col-md-offset-2 col-md-6">
                                        <input name="codeN" type="number" class="email" id="codeVerity"
                                               placeholder="验证码" required maxlength="7">
                                        <input name="" type="email" class="email" id="codeEmail"
                                               placeholder="验证码"  style="display: none">
                                    </fieldset>
                                    <fieldset class="col-md-4 button-holder">
                                        <input name="su1" type="submit" style="background: #31708f" readonly onclick="codes();"
                                               class="button default tada"
                                               value="验证"/>
                                    </fieldset>
                                </div>
                                <p class="subscribe-text">请及时查看您的电子邮件哦!</p>
                            </form>

                        @else
                            <script> var isLogined = true;</script>
                        @endif

                    </div>
                </div>


                <div id="menu-2"  class="content about-section">
                    <div id="leftDiv">
                    <div class="row" >
                        <!--我的预约信息-->

                        <div class="col-md-8 col-sm-8">
                            <div class="box-content profile">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
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
                                <h3 class="widget-title">近来预约记录</h3>
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
                </div>


                <div id="menu-3" class="content gallery-section">
                    <div class="box-content" id="seatInfo">

                        <!--导航菜单-->
                        <div class="seatDiv" id="seatNav">
                            <div><h3 class="widget-title" style="cursor: pointer;color: white;" id="seatIndex"
                                     onclick="page(1,true)">
                                    <i class="fa-solid fa-table "></i>&nbsp;&nbsp;<span>座位信息</span> </h3>
                            </div>
                            <div class="seatNav">
                                <ul>
                                    <li class="searchLi">
                                        <form onsubmit="return false" class="searchForm">
                                            <div class="search-wrapper">
                                                <div class="input-holder">
                                                    <input type="text" class="search-input"
                                                           placeholder="Type to search" required/>
                                                    <button id="searchI" class="search-icon"
                                                            onclick="searchToggle(this, event);">
                                                        <span style="display: none;">
                                                        </span>
                                                        <i style="font-size: 21px"
                                                           class="fa-solid fa-magnifying-glass"></i>
                                                    </button>
                                                    <input type="submit" id="subSear" onclick="submitFn(this, event);"
                                                           style="display: none">
                                                    <button type="submit" style="display: none" onclick="subSearch1();"
                                                            id="searchI1" class="search-icon"
                                                    >
                                                        <span style="display: none;">
                                                        </span>
                                                        <i style="font-size: 21px"
                                                           class="fa-solid fa-magnifying-glass"></i>
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
                                    <li><i class="fa-solid fa-book-open"></i></li>
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


                        <!--未登录弹窗-->
                        <div class="input " id="unLoginDiv" style="display: none">
                            <h1 style="font-size: 27px;padding: 30px"><i class="fa-solid fa-triangle-exclamation"></i>
                                未登录</h1>
                            <fieldset>
                                <div class="endDiv">
                                    <button type="button" onclick="EscClose();" class="action butYuyue"
                                            data-dialog-close>关闭
                                    </button>

                                    <input type="button" class="butYuyue" onclick="homebutton();"
                                           id="bn1"
                                           value="登录">
                                </div>
                            </fieldset>
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
                            <div class="returnTop"><i id="returnTop" class="fa-solid fa-chevron-up"></i></div>
                        </div>
                    </div>


                </div>

                <div id="menu-4" class="content contact-section">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="box-content">
                                <h3 class="widget-title"></h3>
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
                                        <input name="repassword" type="password" required class="subject" id="subject1"
                                               placeholder="重复密码...">
                                    </fieldset>
                                    <fieldset>
                                            <textarea name="message" id="message" cols="30" rows="4"
                                                      placeholder="Message.."></textarea>
                                    </fieldset>
                                    <fieldset>
                                        <input type="submit" class="button"  style="background: #777;" onclick="enrol(this);" id="button1"
                                               value="暂未开发">
                                    </fieldset>

                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="box-content">
                                <h3 class="widget-title">Stay In Touch</h3>
                                <p>几个个人社交帐号,只为装饰 <br><br>最后一个是网易云歌单外链.
                                </p>
                                <div class="about-social">
                                    <ul>
                                        <li>
                                            <a href="https://github.com/HtLimite" target="_blank" class="fa-brands fa-github"></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/honor_ht" target="_blank" class="fa-brands fa-twitter"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"  class="fa-brands fa-youtube"></a>
                                        </li>
                                        <li>
                                            <a href="//music.163.com/outchain/player?type=0&id=7339847963&auto=1&height=430" target="_blank" class="fa-solid fa-headphones"></a>
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
                        <a class="show-1 active homebutton" href="javascript:;"><i class="fa fa-home"></i>首页</a>
                    </li>
                    <li>
                        <a id="shouye" class="show-2 aboutbutton" onclick="myMessage(student);" href="#"><i
                                class="fa fa-user"></i>我的</a>
                    </li>
                    <li>
                        <a class="show-3 projectbutton" href="javascript:;" onclick="seat();"><i
                                class="fa-solid fa-swatchbook"></i>预约</a>
                    </li>
                    <li>
                        <a class="show-5 contactbutton" href="javascript:;"><i class="fa-brands fa-uniregistry"></i>关于</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- css3 svg弹窗 预约-->
<!-- css3 svg弹窗-->
<link rel="stylesheet" type="text/css" href="/seat/style/dialog.css"/>
<link rel="stylesheet" type="text/css" href="/seat/style/dialog-henry.css"/>
<script src="/seat/snap.svg-min.js"></script>
<script src="/seat/modernizr.custom.js"></script>
<div id="cssTan" >
    <div class="button-wrap" style="display: none">
        <button data-dialog="somedialog" class="trigger">Open Dialog</button>
    </div>
    <div id="somedialog" class="dialog">
        <div class="dialog__overlay"></div>
        <div class="dialog__content" style="padding-top: 0;width: 100%">
            <div class="morph-shape"
                 data-morph-open="M0,0h80c0,0,0,9.977,0,29.834c0,19.945,0,30.249,0,30.249H0c0,0,0-10.055,0-30.332C0,8.219,0,0,0,0z"
                 data-morph-close="M0,29.75h80c0,0-3.083,0.014-3.083,0.041c0,0.028,3.083,0.042,3.083,0.042H0c0,0,3.084-0.014,3.084-0.042
	C3.084,29.762,0,29.75,0,29.75z">
                <svg width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
                    <path d="M0,29.75h80c0,0-3.083,0.014-3.083,0.041c0,0.028,3.083,0.042,3.083,0.042H0c0,0,3.084-0.014,3.084-0.042
	C3.084,29.762,0,29.75,0,29.75z"></path>
                </svg>
            </div>

            <!--内容-->
            <div class="dialog-inner">

                <div class="input ">

                    <h1><i class="fa-solid fa-book-open-reader"></i> <span class="editH1">预约</span></h1>
                    <form class="" id="yuyueForm" onsubmit="return yuYue('预约','{{csrf_token()}}');">
                        <div>
                            <h2 class="seatId">座位号</h2>
                            <div class="numSeat">null</div>
                        </div>
                        <div id="seatEditMo">
                            <fieldset>
                                <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                                    <span>开始时间</span>
                                    <input id="beginT" autocomplete="off" required>
                                </div>
                                <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                                    <span>结束时间</span>
                                    <input required id="endT" autocomplete="off" class="endInput"></div>
                            </fieldset>

                            <fieldset>
                                <p class="timeType"><span>&nbsp;有效预约时间:8:00-23:00</span></p>
                            </fieldset>

                            <fieldset>
                                <div class="endDiv">
                                    <button type="button" class="action butYuyue"
                                            data-dialog-close>关闭
                                    </button>

                                    <input type="submit" class="butYuyue" onclick=""
                                           id="bn1"
                                           value="预约">
                                </div>


                            </fieldset>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- css3 svg弹窗-->
<script src="/seat/classie.js"></script>
<script src="/seat/dialogFx.js"></script>
<script>
    (function () {
        var dlgtrigger = document.querySelector('[data-dialog]'),
            somedialog = document.getElementById(dlgtrigger.getAttribute('data-dialog')),
            // svg..
            morphEl = somedialog.querySelector('.morph-shape'),
            s = Snap(morphEl.querySelector('svg')),
            path = s.select('path'),
            steps = {
                open: morphEl.getAttribute('data-morph-open'),
                close: morphEl.getAttribute('data-morph-close')
            },
            dlg = new DialogFx(somedialog, {
                onOpenDialog: function (instance) {
                    // animate path
                    path.stop().animate({
                        'path': steps.open
                    }, 400, mina.easeinout);
                },
                onCloseDialog: function (instance) {
                    // animate path
                    path.stop().animate({
                        'path': steps.close
                    }, 400, mina.easeinout);
                }
            });
        dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));
    })();
</script>


<!-- SITE-FOOTER -->
<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <p><span>陕ICP备</span><a href="https://beian.miit.gov.cn/" target="_blank">2024030857号</a><span style="margin-left:10px"></span>Copyright &copy; Reiki</p>
            </div>
        </div>
    </div>
</div>

<!-- .site-footer -->


<script>
    //用户邮箱传入js全局变量
    var student = "<?php echo session('email');?>";
</script>


{{--<script src="/index/js/vendor/jquery-1.10.2.min.js"></script>--}}
<script src="/js/jquery-3.6.0.js"></script>
<script src="/index/js/plugins.js"></script>
<script src="/index/js/main.js"></script>
<script src="/student/js/spop.min.js"></script>


<!--vue轮播图js-->
<script src="/seat/lunbo/vue.min.2.2.2.js"></script>
<script src="/seat/lunbo/lunbo.js"></script>


<!-- css3 svg弹窗-->
{{--<script src="/seat/classie.js"></script>--}}
{{--<script src="/seat/dialogFx.js"></script>--}}
<!--座位信息-->
<script src="/seat/my.js"></script>

<!--时钟选择-->
<!--
<script scr="/seat/components.js"></script>
<script scr="/seat/leo-srcoll.js"></script>
<script scr="/seat/index.js"></script>
-->


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
            if (isLogined) {
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

    //是否预约
    function isReserve() {
        if (student) {
            $.get("/isYuYue/" + student, function (data) {
                if (data == 0) {
                    //解锁
                    seatLock = true;
                } else {
                    //锁住
                    // console.log(seatLock)
                    seatLock = false;
                }
            });
        } else {
            seatLock = true;
        }
    }

    isReserve();



    //座位展示
    //监控浏览器屏幕大小
    $(window).resize(windowsSize);

    // bodyWidth = document.body.clientWidth;
    //
    // if(bodyWidth <= 483){
    //
    //     $("#seatIndex span").text('');
    //
    // }
    function windowsSize(){
        if ($(window).width() < 548){
            $("#seatIndex span").text('');
        } else{
            $("#seatIndex span").text('座位信息');
        }
    }
    windowsSize();

    //座位展示点击函数
    page(1, true);

    function seat() {
        $("#navhidden").fadeOut("slow");
        $("#navhidden").css("width", "0");

        $(".col-md-9").css('width','100%');
        $(".seatBlock").css("width", "20%");
        // //调用第一页座位信息展示
        page(1, true);
        //调用预约检查锁
        isReserve();
        //触发弹窗函数
        TanChuang();

    }

    //LOGO
    function logo() {
        $("#shouye").click();
        $("#navhidden").fadeIn("slow");
        $("#navhidden").css("width", "25%");
        $(".col-md-9").css('width','');
        $(".col-md-4").css("width", "33.33333333%");
    }

    //分页ajax刷新
    function page(pages, bool, status) {
        //节流
        if (!lock) {
            return;
        }
        var bool = bool;
        $.get('/library/1', {'page': pages, 'status': status}, function (data) {
            //关锁
            lock = false;
            setTimeout(function () {
                lock = true;
            }, 3000);
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
                //判断状态分页
                if (status == undefined) {
                    //正常id顺序页面
                    $("#seatOne").html(data);
                } else {
                    //状态页面
                    $("#seatOne").html(data);

                    // $("#dataSeat").html(data);

                }
                // $"#seatDisplay").load(location.href + " #seatDisplay");
            }
        })
    }

</script>


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
        }

        function scrollPage() {
            scrollPosition = {
                x: window.pageXOffset || docElem.scrollLeft,
                y: window.pageYOffset || docElem.scrollTop
            };
            didScroll = false;
        }

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

    var codeEmail;

    //QQ邮箱登录/注册
    function QQenrol(obj) {

        //获取qq邮箱
        const qqeamil = $("#subscribe-email").val();
        //js验证qq邮箱
        if (qqeamil == "") {
            return;
        }
        const qqEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (!qqEmail.test(qqeamil)) {
            spop({
                template: '<h4 style="color: white" class="spop-body">请输入正确的邮箱!</h4>',
                position: 'top-left',
                style: 'warning',
                autoclose: 7000,
            })
            return;
        }
        //防sql注入
        var regex = /^(.*)(select|insert|into |delete|from |count|drop|join|union|table|database|update|truncate|asc\(|mid\(|char\(|xp_cmdshell|exec |master|net localgroup administrators|\"|:|net user|\| or )(.*)$/gi;

        if (regex.test(qqeamil)) {
            spop({
                template: '<h4 style="color: red" class="spop-body">当你看到这条信息时,摄像头前的你正在犯罪!</h4>',
                position: 'bottom-right',
                style: 'warning',
                autoclose: 7000,
            });
            return;
        }
        codeEmail = qqeamil;

        codeN = $("#codeN").html();
        //ajax
        $.post('/library ', {email: qqeamil, '_token': '{{csrf_token()}}'}, function (data) {
            //注册 2
            if (data.code == 2) {
                spop({
                    template: '<h4 style="color: black" class="spop-body">请查收您的邮箱验证注册 </h4>',
                    position: 'top-left',
                    style: 'success',
                    autoclose: 3000,
                });
                $("#logForm").html(codeN);
            } else if (data.code == 1) {
                //登录 1
                spop({
                    template: '<h4 style="color: black" class="spop-body">请查收您的电子邮箱验证登录 </h4>',
                    position: 'top-left',
                    style: 'success',
                    autoclose: 3000,
                });

                if(data.filePath != null){
                    $(".picMy").attr('src',data.filePath);
                }
                $("#logForm").html(codeN);
            } else if (data.code == 3) {
                spop({
                    template: '<h4 style="color: #b85b53" class="spop-body">失败!登录太频繁,请30s后重试 </h4>',
                    position: 'top-left',
                    style: 'warning',
                    autoclose: 3000,
                });
            }
        });
    }


    //验证码
    function codes(){
        var code = $("#codeVerity").val();
        if(code.length !== 7) return;

        spop({
            template: '<h4 style="color: yellow" class="spop-body">正在验证中... </h4>',
            position: 'top-left',
            style: 'info',
            autoclose: 3000,
        });
        $.post('/codeVerify',{'_token':'{{csrf_token()}}','code':code,'codeEmail':codeEmail},function (data,status){

            console.log(status);
            if(data.code === 'success'){
                location.reload();
            }else if(data.status === 403){
                spop({
                    template: '<h4 style="color: red" class="spop-body">状态'+ data.status +'验证失败</h4>',
                    position: 'top-left',
                    style: 'error',
                    autoclose: 3000,});
                location.reload();
            }else if(data.status === 423){
                spop({
                    template: '<h4 style="color: red" class="spop-body">'+ data.status +'账号已被管理员禁用</h4>',
                    position: 'top-left',
                    style: 'error',
                    autoclose: 3000,});
            }
            setTimeout(function (){
                location.reload();

            },3000);
        });
    }
</script>


</body>

</html>
