<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library-Admin</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="/index/images/logo.png">
    <link rel="stylesheet" href="/admin/bootstrap.min.css">
    <script src="/js/jquery-3.6.0.js"></script>
    <script src="/seat/bootstrap.js"></script>
    <style>
        .navbar-blue {
            background-color: #ccc;
        }

        .navbar .navbar-brand {
            color: black;
        }

        .navbar .navbar-brand:hover {
            color: black;
        }

        .navbar-default .navbar-nav > li > a {
            color: black;
        }

        .navbar-default .navbar-nav > li > a:hover {
            color: black;

        }
        .buttonP{
            line-height: 35px;
            margin-left: 30px;
        }

        .body {
            margin-top: 90px;
        }

        .list-group {
            display: none;
        }
        .panel-primary{
            cursor: pointer;
        }
        .panel-primary > .panel-heading {
            background-color: #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- 导航条 -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-blue" role="navigation">
        <div class="container-fluid">
            <!-- 导航logo -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img style="display:inline" width="30px" src="/style/admin/img/1.png"
                                                      alt=""> Lim-图书预约后台管理系统</a>
            </div>

            <!-- 出logo以外 -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/admin/flush"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">后台管理<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">{{session("lenovoAdminUserInfo.name")}}</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#editPass">修改密码</a></li>
                            <li><a href="#">前台首页</a></li>
                            <li><a href="/admin/logout">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- 内容区域 -->
    <div class="row body">

        <!-- 菜单 -->
        <div class="col-md-2">

            <!-- 管理员管理-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="admin"><span class="glyphicon glyphicon-user"></span> 管理员管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/admin">管理员列表</a></li>

                </ul>
            </div>
            <!-- 座位管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="user"><span class="glyphicon glyphicon-user"></span> 座位管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/seat" >座位列表</a></li>

                </ul>
            </div>


            <!-- 学生管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="types"><span class="glyphicon glyphicon-tasks"></span> 学生管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/student" >学生列表</a></li>
                </ul>
            </div>
            <!-- 记录管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="goods"><span class="glyphicon glyphicon-gift"></span> 记录管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="javascript:;" onclick="record();">记录信息</a></li>
                </ul>
            </div>
        <!-- 评论管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="comment"><span class="glyphicon glyphicon-envelope"></span> 评论管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/comment">评论列表</a></li>
                </ul>
            </div>

            <!-- 系统管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="sys"><span class="glyphicon glyphicon-certificate"></span> 系统管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/sys/config">系统配置</a></li>
                    <li class="list-group-item"><a href="/admin/sys/slider">轮播图管理</a></li>
                    <li class="list-group-item"><a href="/admin/sys/ads">广告管理</a></li>
                    <li class="list-group-item"><a href="/admin/sys/types">分类广告管理</a></li>

                </ul>
            </div>
        </div>

        <!-- 占位 -->
        @yield('main')
    </div>
</div>

<!-- 添加页面模态框 -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">添加管理员</h4>
            </div>
            <div class="modal-body">
                <form action="" onsubmit="return false;" id="formAdd">
                    <div class="form-group">
                        <label for="">用户名</label>
                        <input type="text" name="name" class="form-control" placeholder="请输入原密码" id="">
                        <div id="userInfo">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">密码</label>
                        <input type="password" name="pass" class="form-control" placeholder="请输入新密码" id="">
                        <div id="passInfo">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">确认密码</label>
                        <input type="password" name="repass" class="form-control" placeholder="请再次输入密码" id="">
                    </div>
                    <div class="form-group">
                        <label for="">状态</label>
                        <br>
                        <input type="radio" name="status" checked value="0" id="">正常
                        <input type="radio" name="status" value="1" id="">禁用
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" value="提交" onclick="add()" class="btn btn-success">
                        <input type="reset" id="reset" value="重置" class="btn btn-danger">
                    </div>

                    <div style="clear:both"></div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- 修改页面模态框 -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改管理员</h4>
            </div>
            <div class="modal-body" id="body">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>


    mianBan = $(".col-md-10");

    function record() {
        $.post('/admin/record',{'_token':'{{csrf_token()}}'},function(data){
            mianBan.html(data);
        });
    }

    // ajax修改数据

    function save() {
        // 表单序列化

        str = $("#formEdit").serialize();

        // 提交到下一个页面

        $.post("/admin/admin/1", {str: str, "_method": 'put', '_token': '{{csrf_token()}}'}, function (data) {

            // 判断data
            if (data == 1) {

                window.location.reload();

            } else if (data) {


                // 密码提示信息

                if (data.pass) {
                    str = "<div class='alert alert-danger'>" + data.pass + "</div>";
                } else {
                    str = "<div class='alert alert-success'>√</div>";
                }

                $("#passInfo1").html(str);


            } else {
                alert('添加失败');
            }
        });
    }

    // ajax修改的方法

    function edit(id) {
        // 发送ajax请求
        $.get("/admin/admin/" + id + "/edit", {}, function (data) {

            if (data) {

                $("#body").html(data);
            }
            ;

        });

    }

    // ajax修改状态

    function status(obj, id, status) {

        // 发送ajax请求

        if (status) {
            // 发送ajax请求

            $.post('/admin/admin/ajaxStatu', {id: id, "_token": "{{csrf_token()}}", "status": "0"}, function (data) {

                if (data == 1) {
                    $(obj).parent().html('<td><span class="btn btn-success" onclick="status(this,' + id + ',0)">正常</span></td>')
                } else {

                    alert('修改失败');
                }

            })
        } else {

            $.post('/admin/admin/ajaxStatu', {id: id, "_token": "{{csrf_token()}}", "status": "1"}, function (data) {

                if (data == 1) {
                    $(obj).parent().html('<td><span class="btn btn-danger" onclick="status(this,' + id + ',1)">禁用</span></td>')
                } else {

                    alert('修改失败');
                }

            })
        }
    }

    // ajax删除

    function deletes(obj, id) {
        // 发送ajax请求

        $.post("/admin/admin/" + id, {"_token": '{{csrf_token()}}', "_method": "delete"}, function (data) {
            // 判断是否成功

            if (data == 1) {
                // 移除数据

                $(obj).parent().parent().remove();

                // 数量计算

                tot = Number($("#tot").html());

                $("#tot").html(--tot);
            } else {
                alert('删除失败');
            }
        })
    }

    // 添加的处理操作

    function add() {
        // 表单序列化

        str = $("#formAdd").serialize();

        // 提交到下一个页面

        $.post('/admin/admin', {str: str, '_token': '{{csrf_token()}}'}, function (data) {

            // 判断data
            if (data == 1) {
                // 关闭弹框
                $(".close").click();
                // 重置表单内容
                $("#reset").click();

                // 清空提示信息

                $("#passInfo").html('');
                $("#nameInfo").html('');

                window.location.reload();


            } else if (data) {
                // 用户名提示信息
                var str = '';
                if (data.name) {
                    str = "<div class='alert alert-danger'>" + data.name + "</div>";
                } else {
                    str = "<div class='alert alert-success'>√</div>";
                }

                $("#userInfo").html(str);

                // 密码提示信息

                if (data.pass) {
                    str = "<div class='alert alert-danger'>" + data.pass + "</div>";
                } else {
                    str = "<div class='alert alert-success'>√</div>";
                }

                $("#passInfo").html(str);


            } else {
                alert('添加失败');
            }
        });
    }
</script>
</div>
</div>


<!-- 修改密码的摸态框 -->
<div class="modal fade" id="editPass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">原密码</label>
                        <input type="password" name="" class="form-control" placeholder="请输入原密码" id="">
                    </div>
                    <div class="form-group">
                        <label for="">新密码</label>
                        <input type="password" name="" class="form-control" placeholder="请输入新密码" id="">
                    </div>
                    <div class="form-group">
                        <label for="">确认密码</label>
                        <input type="password" name="" class="form-control" placeholder="请再次输入密码" id="">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" value="提交" class="btn btn-success">
                        <input type="reset" value="重置" class="btn btn-danger">
                    </div>

                    <div style="clear:both"></div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<?php

// 获取URL地址参数

//$path=$_SERVER['REDIRECT_URL'];

// 分割字符串

//$arr=explode('/', $path);

// 获取名

//$name=isset($arr[2])?$arr[2]:'';

?>
<script>
    // 菜单切换
    $(".panel-title").click(function () {
        $(".list-group").hide();
        $(this).parent().next().toggle(500);
    });

    {{--$("#{{$name}}").click();--}}
</script>
</html>
