<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>登录</title>

    <link rel="shortcut icon" href="/student/images/Reiki.icon">
    <link rel="stylesheet" href="/student/css/normalize.css">
    <link rel="stylesheet" href="/css/fontawesome/css/all.css" type="text/css">
    <link rel="stylesheet" href="/student/css/login.css">
    <link rel="stylesheet" href="/student/css/sign-up-login.css">

    {{--    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">--}}
    <link rel="stylesheet" href="/student/css/inputEffect.css"/>
    <link rel="stylesheet" href="/student/css/verifyCode.css"/>
    <link rel="stylesheet" href="/student/css/tooltips.css"/>
    <link rel="stylesheet" href="/student/css/spop.min.css"/>
    <style>
        html {
            width: 100%;
            height: 100%;
        }

        #body {

            background-repeat: no-repeat;

            background-position: center center #2D0F0F;

            background-color: #00BDDC;

            background-image: url(/student/images/background.jpg);

            background-size: 100% 100%;

            height: 100vh;

            min-height: 734px;

            min-width: 500px;

        }

        .snow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 100001;
        }

    </style>

</head>
<body>
<div id="body">
    <!-- 雪花背景 -->
    <div class="snow-container"></div>
    <!-- 登录控件 -->
    <div id="login">
        <input id="tab-1" type="radio" name="tab" class="sign-in hidden" checked/>
        <input id="tab-2" type="radio" name="tab" class="sign-up hidden"/>
        <input id="tab-3" type="radio" name="tab" class="sign-out hidden"/>
        <div class="wrapper">
            <!-- 登录页面 -->
            <div class="login sign-in-htm">
                <form id="Logform" class="container offset1 loginform" onsubmit="return false">
                    <!-- 猫头鹰控件 -->
                    <div id="owl-login" class="login-owl">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <div class="pad input-container">
                        <h3 style="color:black;">图书馆系统</h3>
                        <section class="content">
							<span class="input input--hideo">
								<input name="account" class="input__field input__field--hideo" type="text"
                                       id="login-username"
                                       autocomplete="off" placeholder="请输入学号" tabindex="1" maxlength="15"/>
								<label class="input__label input__label--hideo" for="login-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            <span class="input input--hideo">
								<input name="password" class="input__field input__field--hideo" type="password"
                                       id="login-password" placeholder="请输入密码" tabindex="2" maxlength="15"/>
								<label class="input__label input__label--hideo" for="login-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            <span class="input input--hideo input--verify_code">
								<input class="input__field input__field--hideo" type="text" id="login-verify-code"
                                       autocomplete="off" placeholder="请输入验证码" tabindex="3" maxlength="4"/>
								<label class="input__label input__label--hideo" for="login-verify-code">
									<i class="fa fa-fw fa-bell-o icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            <canvas class="verify-code-canvas" id="login-verify-code-canvas"></canvas>
                        </section>
                    </div>
                    <div class="form-actions">
                        <a tabindex="4" class="btn pull-left btn-link text-muted" onclick="goto_forget()">修改密码</a>
                        <a tabindex="5" class="btn btn-link text-muted" onclick="goto_register()">注册</a>
                        <input class="btn btn-primary" type="submit" tabindex="3" onclick="login()" value="登录"
                               style="color:white;"/>
                    </div>
                </form>
            </div>
            <!-- 忘记密码页面 -->
            <div class="login sign-out-htm">
                <form action="#" id="forgetForm" class="container offset1 loginform" onsubmit="return false">
                    <!-- 猫头鹰控件 -->
                    <div id="owl-login" class="forget-owl">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <div class="pad input-container">
                        <section class="content">
							<span class="input input--hideo">
								<input name="account" class="input__field input__field--hideo" type="text"
                                       id="forget-account" autocomplete="off" placeholder="请输入学号"/>
								<label class="input__label input__label--hideo" for="forget-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            <span class="input input--hideo">
								<input name="email" class="input__field input__field--hideo" type="text"
                                       id="forget-email" autocomplete="off" placeholder="注册邮箱"/>
								<label class="input__label input__label--hideo" for="forget-username">
									<i class="fa-solid fa-envelope icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            {{--                        <span class="input input--hideo">--}}
                            {{--								<input class="input__field input__field--hideo" type="text" id="forget-code" autocomplete="off" placeholder="请输入注册码"/>--}}
                            {{--								<label class="input__label input__label--hideo" for="forget-code">--}}
                            {{--									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>--}}
                            {{--									<span class="input__label-content input__label-content--hideo"></span>--}}
                            {{--								</label>--}}
                            {{--							</span>--}}
                            <span class="input input--hideo">
								<input name="password" class="input__field input__field--hideo" type="password"
                                       id="forget-password" placeholder="原密码"/>
								<label class="input__label input__label--hideo" for="forget-password">
                                    <i class="fa-solid fa-key icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                            <span class="input input--hideo">
								<input name="new-password" class="input__field input__field--hideo" type="password"
                                       id="new-password" placeholder="新密码"/>
								<label class="input__label input__label--hideo" for="forget-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
                        </span>
                            <span class="input input--hideo">
								<input name="new-repass" class="input__field input__field--hideo" type="password"
                                       id="new-repass" placeholder="确认密码"/>
								<label class="input__label input__label--hideo" for="forget-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
                        </section>
                    </div>
                    <div class="form-actions">
                        <a class="btn pull-left btn-link text-muted" onclick="goto_login()">返回登录</a>
                        <input class="btn btn-primary" type="submit" onclick="forget()" value="重置密码"
                               style="color:white;"/>
                    </div>
                </form>
            </div>
            <!-- 注册页面 -->
            <div class="login sign-up-htm">
                <form onsubmit="return false" class="container offset1 loginform" id="Regform">
                    <!-- 猫头鹰控件 -->
                    <div id="owl-login" class="register-owl">
                        <div class="hand"></div>
                        <div class="hand hand-r"></div>
                        <div class="arms">
                            <div class="arm"></div>
                            <div class="arm arm-r"></div>
                        </div>
                    </div>
                    <div class="pad input-container">
                        <section class="content">
						<span class="input input--hideo">
							<input name="account" class="input__field input__field--hideo" type="text"
                                   id="register-username"
                                   autocomplete="off" placeholder="请输入学号" maxlength="15"/>
							<label class="input__label input__label--hideo" for="register-username">
							    <i class="fa fa-fw fa-user icon icon--hideo"></i>
							    <span class="input__label-content input__label-content--hideo"></span>
	    					</label>
                        </span>
                            <span class="input input--hideo">
							<input name="email" class="input__field input__field--hideo" type="text" id="register-email"
                                   autocomplete="off" placeholder="QQ邮箱" maxlength="17"/>
							<label class="input__label input__label--hideo" for="register-username">
                                <i class="fa-solid fa-envelope icon icon--hideo"></i>
                                <span class="input__label-content input__label-content--hideo"></span>
	    					</label>
                        </span>
                            <span class="input input--hideo">
								<input name="password" class="input__field input__field--hideo" type="password"
                                       id="register-password" placeholder="请输入密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="register-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
						</span>
                            <span class="input input--hideo">
								<input name="repass" class="input__field input__field--hideo" type="password"
                                       id="register-repassword" placeholder="请确认密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="register-repassword">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
					    </span>
{{--                            <span class="input input--hideo">--}}
{{--                                <input class="input__field input__field--hideo" type="text"--}}
{{--                                       id="register-code" autocomplete="off"--}}
{{--                                       placeholder="请输入注册码"/>--}}
{{--                                <label class="input__label input__label--hideo"--}}
{{--                                       for="register-code">--}}
{{--                                    <i class="fa fa-fw fa-wifi icon icon--hideo"></i>--}}
{{--                                    <span--}}
{{--                                        class="input__label-content input__label-content--hideo"></span>--}}
{{--                                </label>--}}
{{--                            </span>--}}
                        </section>
                    </div>
                    <div class="form-actions">
                        <a class="btn pull-left btn-link text-muted" onclick="goto_login()">返回登录</a>
                        <input class="btn btn-primary" type="submit" onclick="register()" value="注册"
                               style="color:white;"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
{{--顺序不可乱--}}
<script src="/js/jquery-3.6.0.js"></script>
<script src="/student/js/sakura.js"></script>
<script src="/student/js/jquery.pure.tooltips.js"></script>
<script src="/student/js/verifyCode.js"></script>
<script src="/student/js/spop.min.js"></script>
<script src="/student/js/bootstrap.js"></script>
<script>
    (function () {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function () {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function () {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
            // in case the input is already filled..
            if (inputEl.value.trim() !== '') {
                classie.add(inputEl.parentNode, 'input--filled');
            }

            // events:
            inputEl.addEventListener('focus', onInputFocus);
            inputEl.addEventListener('blur', onInputBlur);
        });

        function onInputFocus(ev) {
            classie.add(ev.target.parentNode, 'input--filled');
        }

        function onInputBlur(ev) {
            if (ev.target.value.trim() === '') {
                classie.remove(ev.target.parentNode, 'input--filled');
            }
        }
    })();

    $(function () {
        $('#login #login-password').focus(function () {
            $('.login-owl').addClass('password');
        }).blur(function () {
            $('.login-owl').removeClass('password');
        });
        $('#login #register-password').focus(function () {
            $('.register-owl').addClass('password');
        }).blur(function () {
            $('.register-owl').removeClass('password');
        });
        $('#login #register-repassword').focus(function () {
            $('.register-owl').addClass('password');
        }).blur(function () {
            $('.register-owl').removeClass('password');
        });
        $('#login #forget-password').focus(function () {
            $('.forget-owl').addClass('password');
        }).blur(function () {
            $('.forget-owl').removeClass('password');
        });
    });

    //验证码刷新方法
    function yzm() {
        $("#login-verify-code-canvas").click();
    }

    function goto_register() {
        $("#register-username").val("");
        $("#register-email").val("");
        $("#register-password").val("");
        $("#register-repassword").val("");
        $("#register-code").val("");
        $("#tab-2").prop("checked", true);
    }

    function goto_login() {
        $("#login-username").val("");
        $("#login-password").val("");
        $("#login-verify-code").val("");
        yzm();
        $("#tab-1").prop("checked", true);
    }

    function goto_forget() {
        $("#forget-account").val("");
        $("#forget-password").val("");
        $("#forget-email").val("");
        $("#new-password").val("");
        $("#new-repass").val("");
        $("#tab-3").prop("checked", true);
    }

    //登录方法
    function login(obj) {
        //登录js验证
        var username = $("#login-username").val(),
            email = $("#login-email").val(),
            password = $("#login-password").val(),
            verifycode = $("#login-verify-code").val(),
            validatecode = null,
            flag = false;
        // 判断用户名密码是否为空
        if (username == "") {
            $.pt({
                target: $("#login-username"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "用户名不能为空"
            });
            flag = true;
        }
        //用户名只能是15位以下的字母或数字
        var regExp = /^20[0-1]{1}[0-6]{1}[0-9]{7}$/;
        if (!regExp.test(username)) {
            $.pt({
                target: $("#login-username"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "请输入正确的学号!"
            });
            flag = true;
        }
        if (!flag) {
            if (password == "") {
                $.pt({
                    target: $("#login-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "密码不能为空"
                });
                flag = true;
            }
            if (!flag) {
                if (verifycode == "") {
                    $.pt({
                        target: $("#login-verify-code-canvas"),
                        position: 'r',
                        align: 't',
                        width: 'auto',
                        height: 'auto',
                        content: "验证码不能为空"
                    });
                    flag = true;
                }
                if (timeout_flag) {
                    $.pt({
                        target: $("#login-verify-code-canvas"),
                        position: 'r',
                        align: 't',
                        width: 'auto',
                        height: 'auto',
                        content: "验证码已经失效"
                    });
                    flag = true;
                }
                //判断验证码是否正确
                if (verifycode != show_num.join("")) {
                    $.pt({
                        target: $("#login-verify-code-canvas"),
                        position: 'r',
                        align: 't',
                        width: 'auto',
                        height: 'auto',
                        content: "验证码不正确"
                    });
                    flag = true;
                }
            }
        }

        //登录
        //调用后台登录验证的方法
        var str;
        if (flag) {
            return false;
        } else {
            //ajax登录
            //表单序列化
            str = $("#Logform").serialize();
            //ajax jquery 提交
            $.post('/log', {str: str, '_token': '{{csrf_token()}}'}, function (data) {

                    if (data == 1) {
                        spop({
                            template: '<h4 class="spop-title">登录成功!</h4>',
                            position: 'top-center',
                            style: 'success',
                            autoclose: 1000,
                        });
                        setTimeout(() => {
                            window.location.replace('/student/index');
                        }, 1000);
                    } else if (data == 0) {
                        spop({
                            template: '<h4 class="spop-title">密码错误,登录失败!</h4>',
                            position: 'top-center',
                            style: 'success',
                            autoclose: 3000,
                        });
                    } else if (data == 2) {
                        spop({
                            template: '<h4 class="spop-title">账号不存在!</h4>',
                            position: 'top-center',
                            style: 'success',
                            autoclose: 3000,
                        });
                    } else {
                        spop({
                            template: '<h4 class="spop-title">账号没有激活!</h4>',
                            position: 'top-center',
                            style: 'success',
                            autoclose: 3000,
                        });
                    }
                }
            );
        }
    }

    //邮箱注册
    function qqemail() {
        var email = $("#register-email").val();

        // ajax提交到下一个页面
        $.get('/email', {email: email}, function (data) {
            if (data.email) {
                message = "<h4 style='margin: 0 auto'' class='spop-title'>" + data.email + "</h4>";
            }
            if (data.code == 1) {
                spop({
                    template: "<h4 style='margin: 0 auto'' class='spop-title'>已发送至您的邮箱,请注意查收</h4>",
                    position: 'top-center',
                    style: 'error',
                    autoclose: 3000,
                });
"<h4 style='margin: 0 auto'' class='spop-title'>已发送至您的邮箱,请注意查收</h4>";
            }
            if (data.code == 0) {
                message = "<h4 style='margin: 0 auto'' class='spop-title'>邮箱注册失败,请重试!</h4>";
            }
            spop({
                template: message,
                position: 'top-center',
                style: 'error',
                autoclose: 3000,
            });
        });
    }


    //注册
    function register() {
        //注册js验证
        var username = $("#register-username").val(),
            useremail = $("#register-email").val(),
            password = $("#register-password").val(),
            repassword = $("#register-repassword").val(),
            // code = $("#register-code").val(),
            flag = false,
            time = false,
            validatecode = null;
        //判断学号密码是否为空
        if (username == "") {
            $.pt({
                target: $("#register-username"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "学号不能为空"
            });
            flag = true;
        }
        //学号只能是15位以下的字母或数字
        var regExp = /^20[0-1]{1}[0-6]{1}[0-9]{7}$/;
        if (!regExp.test(username)) {
            $.pt({
                target: $("#register-username"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "请输入正确学号"
            });
            flag = true;
        }
        if (!flag) {
            // 判断QQ邮箱是否正确 [1-9][0-9]{4,}@qq.com
            var qqEmail = /[1-9][0-9]{4,}@qq.com/;
            if (!qqEmail.test(useremail)) {
                $.pt({
                    target: $("#register-email"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "请输入正确的QQ邮箱!"
                });
                flag = true;
            }
        }

        if (!flag) {
            if (password == "") {
                $.pt({
                    target: $("#register-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "密码不能为空"
                });
                flag = true;
            } else {
                if (password != repassword) {
                    $.pt({
                        target: $("#register-repassword"),
                        position: 'r',
                        align: 't',
                        width: 'auto',
                        height: 'auto',
                        content: "两次输入的密码不一致"
                    });
                    flag = true;
                }
            }
        }
        //检查用户名是否已经存在
        //调后台代码检查用户名是否已经被注册

        //检查注册码是否正确
        //调后台方法检查注册码，这里写死为11111111
        // if(code != '11111111'){
        //     $.pt({
        //         target: $("#register-code"),
        //         position: 'r',
        //         align: 't',
        //         width: 'auto',
        //         height: 'auto',
        //         content:"注册码不正确"
        //     });
        //     flag = true;
        // }

        if (flag) {
            return false;
        } else if (!time) {
            //注册ajax注册
            //表单序列化
            var str = $("#Regform").serialize();
            var email = useremail;

            spop({
                template: '<h4 class="spop-title">正在发送邮件中...</h4>',
                position: 'top-center',
                style: 'info',
                autoclose: 3000,
            });
            // ajax提交到下一个页面
            $.post('/reg', {str: str, '_token': '{{csrf_token()}}'}, function (data) {
                //判断是否成功注册
                var message;
                if (data.reg == 1 && data.email == 1) {
                    spop({
                        template: '<h4 class="spop-title">注册成功,请及时在邮件里激活!</h4>即将于3秒后返回登录',
                        position: 'top-center',
                        style: 'success',
                        autoclose: 3000,
                        onOpen: function () {
                            var second = 2;
                            var showPop = setInterval(function () {
                                if (second == 0) {
                                    clearInterval(showPop);
                                }
                                $('.spop-body').html('<h4 class="spop-title">注册成功,请及时在邮件里激活!</h4>即将于' + second + '秒后返回登录');
                                second--;
                            }, 1000);
                        },
                        onClose: function () {
                            goto_login();
                        }
                    });
                } else {
                    if (data.account) {
                        message = "<h4 style='margin: 0 auto'' class='spop-title'>" + data.account + "</h4>";
                    } else if (data.password) {
                        message = "<h4 style='margin: 0 auto'' class='spop-title'>" + data.password + "</h4>";
                    } else if (data.email) {
                        message = "<h4 style='margin: 0 auto'' class='spop-title'>" + data.email + "</h4>";
                    } else if (data.email == 0) {
                        message = "<h4 style='margin: 0 auto'' class='spop-title'>邮箱未发送成功,请一分钟后再试!</h4>";
                        time = true;
                        setTimeout(() => {
                            time = false;
                        }, 60000);
                    }
                    spop({
                        template: message,
                        position: 'top-center',
                        style: 'error',
                        autoclose: 3000,
                    });
                }
            });
        } else {
            spop({
                template: "<h4 style='margin: 0 auto'' class='spop-title'>请一分钟后再试!</h4>",
                position: 'top-center',
                style: 'warning',
                autoclose: 3000,
            });
        }
    }

    //重置密码
    function forget() {
        var username = $("#forget-account").val(),
            password = $("#forget-password").val(),
            useremail = $("#forget-email").val(),
            newpass = $("#new-password").val(),
            newrepass = $("#new-repass").val(),
            flag = false,
            validatecode = null;
        //判断学号密码是否为空
        //判断学号密码是否为空
        if (username == "") {
            $.pt({
                target: $("#forget-account"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "学号不能为空"
            });
            flag = true;
        }
        //学号只能是15位以下的字母或数字
        var regExp = /^20[0-1]{1}[0-6]{1}[0-9]{7}$/;
        if (!regExp.test(username)) {
            $.pt({
                target: $("#forget-account"),
                position: 'r',
                align: 't',
                width: 'auto',
                height: 'auto',
                content: "请输入正确学号"
            });
            flag = true;
        }
        if (!flag) {
            // 判断QQ邮箱是否正确 [1-9][0-9]{4,}@qq.com
            var qqEmail = /[1-9][0-9]{4,}@qq.com/;
            if (!qqEmail.test(useremail)) {
                $.pt({
                    target: $("#forget-email"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "请输入正确的QQ邮箱!"
                });
                flag = true;
            }
        }

        if (!flag) {
            if (password == "") {
                $.pt({
                    target: $("#forget-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "密码不能为空"
                });
                flag = true;
            } else if (newpass == "") {
                $.pt({
                    target: $("#new-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "新密码不能为空"
                });
                flag = true;
            } else if (newpass != newrepass) {
                $.pt({
                    target: $("#new-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "两次输入的密码不一致"
                });
                flag = true;
            }
        }
        if (!flag) {
            var repass = /^.{7,14}$/;
            if (!repass.test(newpass)) {
                $.pt({
                    target: $("#new-password"),
                    position: 'r',
                    align: 't',
                    width: 'auto',
                    height: 'auto',
                    content: "长度不在7-14之间"
                });
                flag = true;
            }
        }
        if (flag) {
            return false;
        } else {//重置密码
            //ajax异步请求
            var str = $("#forgetForm").serialize()


            $.post('/forget', {str: str, '_token': '{{csrf_token()}}'}, function (data) {
                if (data == 2) {
                    spop({
                        template: "<h4 style='margin: 0 auto'' class='spop-title'>账号或邮箱不正确!</h4>",
                        position: 'top-center',
                        style: 'warning',
                        autoclose: 3000,
                    });
                } else if (data == 0) {
                    spop({
                        template: "<h4 style='margin: 0 auto'' class='spop-title'>原密码错误!!</h4>",
                        position: 'top-center',
                        style: 'error',
                        autoclose: 3000,
                    });
                } else if (data == 1) {
                    spop({
                        template: '<h4 class="spop-title">重置密码成功</h4>即将于3秒后返回登录',
                        position: 'top-center',
                        style: 'success',
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
                        onClose: function () {
                            goto_login();
                        }
                    });
                }
            });
        }
    }
</script>
</html>
