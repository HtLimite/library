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
    <link rel="stylesheet" href="/password/css/style.css">

{{--    //管理员登录弹窗--}}
<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" /> -->
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="/adminlogin/css/content.css"/>
    <script src="/adminlogin/js/modernizr.custom.js"></script>


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

                    <div onclick="adminL();"
                         style="margin-left: 23px; display: inline-flex; align-items: center; height: 18.5px">
                        <i class="fa-solid fa-user-lock"></i>
                        <div>&nbsp;&nbsp;Reiki</div>
                    </div>
                    <div style=" width: 0; height:0;position: absolute;top: 0; left: 116px;">
                        <div class="mockup-content">
                            <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                                <button type="button" id="adminButton" style="opacity: 0;">
                                    Login
                                </button>
                                <div class="morph-content">
                                    <div>
                                        <div class="content-style-form content-style-form-1">
                                            <span class="icon icon-close">Close the dialog</span>
                                            <h2 style="font-size: 37px;">管理员</h2>
                                            <form>
                                                <p  style="position: relative"><label> <i class="fa-solid fa-user"></i></label><input type="text" /></p>
                                                <p style="position: relative"><label><i class="fa-solid fa-lock"></i></label><input type="password"/></p>
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
                        <li>
                            <a href="#" class="fa fa-rss"></a>
                        </li>
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
                <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a class="show-2 aboutbutton" href="#"><i class="fa fa-user"></i>我的</a>
            </li>
            <li>
                <a class="show-3 projectbutton" href="#"><i class="fa-solid fa-swatchbook"></i>预约</a>
            </li>
            <li>
                <a class="show-5 contactbutton" href="#"><i class="fa fa-envelope"></i>登录</a>
            </li>
        </ul>
    </div>
</div>
<div class="copyrights">Collect from <a href="https://www.webmoban.net">免费模板</a></div>
<div class="container" id="page-content">
    <div class="row">


        <div class="col-md-9 col-sm-12 content-holder">
            <!-- CONTENT -->
            <div id="menu-container">

                <div class="logo-holder logo-top-margin">
                    <a href="#" class="site-brand"><img src="/index/images/logo.png" alt=""></a>
                </div>


                <div id="menu-1" class="homepage home-section text-center">
                    <div class="welcome-text">
                        <h2>Hello, Welcome to <strong>RECTANGLE</strong></h2>
                        <p>Rectangle is free mobile template brought to you by <span class="orange">template</span><span
                                class="green">mo</span>.com website. You can download, edit and use this layout for any
                            purpose. Please tell your friends about our
                            website. Thank you.</p>
                        <form action="#" method="get" class="subscribe-form">
                            <div class="row">
                                <fieldset class="col-md-offset-2 col-md-6">
                                    <input name="subscribe-email" type="email" class="email" id="subscribe-email"
                                           placeholder="Write your email here..">
                                </fieldset>
                                <fieldset class="col-md-4 button-holder">
                                    <input name="submit" type="submit" class="button default" id="submit"
                                           value="Submit">
                                </fieldset>
                            </div>
                            <p class="subscribe-text">Please subscribe your email for latest updates!</p>
                        </form>
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
                    <div class="box-content">
                        <h3 class="widget-title">Past Projects</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/1.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Great Nature Capture</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/2.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Another Image Caption</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/3.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Great Nature Capture</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/4.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Another Image Caption</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/5.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Great Nature Capture</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="project-item">
                                    <img src="/index/images/6.jpg" alt="">
                                    <div class="project-hover">
                                        <h4>Another Image Caption</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-pages">
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="menu-4" class="content contact-section">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="box-content">
                                <h3 class="widget-title">注册您的图书馆账号</h3>
                                <form class="contact-form">
                                    <fieldset>
                                        <input type="text" class="name" id="name" placeholder="学号...">
                                    </fieldset>
                                    <fieldset>
                                        <input type="email" class="email" id="email" placeholder="QQEmail...">
                                    </fieldset>
                                    <fieldset>
                                        <input type="password" class="subject" id="subject" placeholder="密码...">
                                    </fieldset>
                                    <fieldset>
                                        <input type="password" class="subject" id="subject" placeholder="重复密码...">
                                    </fieldset>
                                    <fieldset>
                                        <textarea name="message" id="message" cols="30" rows="4"
                                                  placeholder="Message.."></textarea>
                                    </fieldset>
                                    <fieldset>
                                        <input type="submit" class="button" id="button" value="Send Message">
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


        <div class="col-md-3 hidden-sm">

            <nav id="nav" class="main-navigation hidden-xs hidden-sm">
                <ul class="main-menu">
                    <li>
                        <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a class="show-2 aboutbutton" href="#"><i class="fa fa-user"></i>我的</a>
                    </li>
                    <li>
                        <a class="show-3 projectbutton" href="#"><i class="fa-solid fa-swatchbook"></i>预约</a>
                    </li>
                    <li>
                        <a class="show-5 contactbutton" href="#"><i class="fa-brands fa-uniregistry"></i>登录</a>
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
<script>
    spop({
        template: '<h4 class="spop-title">重置密码成功</h4>即将于3秒后返回登录',
        position: 'top-center',
        style: 'warning',
        autoclose: 3000,
        onOpen: function () {
            var second = 2;
            var showPop = setInterval(function () {
                if (second == 0) {
                    clearInterval(showPop);
                }
                $('.spop-body').html('<h4 class="spop-title">重置密码成功</h4>即将于' + second + '秒后返回登录');
                second--;
            }, 1000);
        },
    });

</script>
{{--管理员登录弹窗--}}
<script src="/adminlogin/js/classie.js"></script>
<script src="/adminlogin/js/uiMorphingButton_fixed.js"></script>
<script>
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

    function adminL() {
        document.getElementById("adminButton").click();
    }


</script>

</body>

</html>
