@extends('Admin.public')

@section('main')
    <!--    seat        -->
    <div class="col-md-10">
        <div id="seatData">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                <li><a id="title1" href="#">图书馆座位管理</a></li>
                <li id="title2" class="active">座位列表</li>
                <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span>
                </button>
            </ol>
            <!-- 面版 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button id="manyDele" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除
                    </button>
                    <!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
                    <a href="javascript:;" data-toggle="modal" data-target="#addSeat" class="btn btn-success"><span
                            class="glyphicon glyphicon-plus"></span> 添加座位</a>

                    <p class="pull-right tots buttonP">共有 <span id="tot">{{$totSeat}}</span> 条数据</p>
                    <form action="" class="form-inline pull-right">
                        <div class="form-group">
                            <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                        </div>

                        <input type="submit" value="搜索" class="btn btn-success">
                    </form>
                </div>
                <table id="seat" class="table-bordered table table-hover">
                    <th><input type="checkbox" class="checkboxO" name="" id=""></th>
                    <th>ID</th>
                    <th>名字</th>
                    <th>状态</th>
                    <th>预约学生</th>
                    <th>预约时间</th>

                    @foreach($seat as $value)
                        <tr>
                            <td><input value="{{$value->id}}" type="checkbox" class="checkbox" name="" id=""></td>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->status}}</td>
                            <td>{{$value->student}}</td>
                            <td>{{$value->beginTime}}-------{{$value->endTime}}</td>


                            <td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal"
                                   data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a
                                    href="javascript:;" onclick="deletes(this,{{$value->id}})"
                                    class="glyphicon glyphicon-trash"></a></td>
                        </tr>
                    @endforeach


                </table>
                <div class="panel-footer">
                    {{ $seat->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- 添加页面模态框 -->
    <div class="modal fade" id="addSeat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">添加座位</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formSeatAdd">
                        <div class="form-group">
                            <label for="">名字</label>
                            <input type="text" name="name" required class="form-control" placeholder="请输入密码" id="">
                            <div id="userInfo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">表述</label>
                            <input type="text" name="reserve" class="form-control" placeholder="请输入座位大致介绍" id="">
                            <div id="passInfo">
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="提交" onclick="addSeat()" class="btn btn-success">
                            <input type="reset" id="" value="重置" class="btn btn-danger">
                        </div>
                        <div style="clear:both"></div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <!--删除确认模态框 -->
    <button type="button" id="deletB" class="btn btn-primary" style="display: none" data-toggle="modal"
            data-target="#deleted">
    </button>
    <div class="modal fade" id="deleted">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">确认删除</h4>
                </div>
                <div class="modal-body deleteMessage">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" id="deleteTure" class="btn btn-primary">确定</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        //添加
        function addSeat() {
            str = $("#formSeatAdd").serialize();
            $.get('/admin/seat/create', {'str': str}, function (data) {
                if (data === 0) {
                    str = "<div class='alert alert-danger'>添加失败</div>";
                } else {
                    str = "<div class='alert alert-success'>成功添加</div>";
                }
                $("#userInfo").html(str);
                $("#seatData").load(location.href + " #seatData");
                setTimeout(function () {
                    $(".close").click();
                    $("#reset").click();
                }, 1000);

            })
        }

        //全选/反选
        arr = $(".checkbox");
        oneCheck = $(".checkboxO");
        oneCheck.click(function () {
            if (arr != null) {
                for (var i = 0; i < arr.length; i++) {
                    if (arr[i].checked == false) {
                        arr[i].checked = true;
                    } else {
                        arr[i].checked = false;
                    }
                }
            }
        })
        //批量删除
        $("#manyDele").click(function () {
            var deleArr = [];
            var idArr = [];

            for (var i = 0; i < arr.length; i++) {
                if (arr[i].checked == true) {
                    deleArr.push(arr[i]);
                } else {
                }
            }
            if (deleArr.length <= 0) {
                return;
            }

            for (i = 0; i < deleArr.length; i++) {
                idArr.push(deleArr[i].value);
            }
            str = "<div class='alert alert-danger'>即将删除<strong style='color: red'>" + idArr.length + "</strong>个座位</div>";
            $(".deleteMessage").html(str);
            $("#deletB").click();
            $("#deleteTure").click(function () {
                $.post("/admin/seat/" + idArr, {'_method': 'delete', '_token': '{{csrf_token()}}'}, function (data) {
                    if (data == 1) {
                        str ="<div class='alert alert-success'>已删除<strong >" + idArr.length + "</strong>个座位</div>";
                    }else {
                        str ="<div class='alert alert-danger'>删除<strong >" + idArr.length + "</strong>个座位失败!</div>";
                    }
                    $(".deleteMessage").html(str);
                    $("#seatData").load(location.href + " #seatData");

                    setTimeout(function (){
                        $(".close").click();
                        $(".deleteMessage").html();
                    },1000);
                })
            })
        })


    </script>

@endsection
