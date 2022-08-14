@extends('admin.public')

@section('main')
    <!--    seat        -->
    <div class="col-md-10">
        <div id="seatData">
            <ol class="breadcrumb">
                <li><a href="#"><span class="fa-solid fa-house-user"></span> 首页</a></li>
                <li><a id="title1" href="#">图书馆座位管理</a></li>
                <li id="title2" class="active">座位列表</li>
                <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span>
                </button>
            </ol>
            <!-- 面版 -->
            <div id="displayData">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <button id="" onclick="deleteAll('seat','{{csrf_token()}}');" class="btn btn-danger"><span class="fa-solid fa-trash"></span> 批量删除
                    </button>
                    <!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
                    <a href="javascript:;" data-toggle="modal" data-target="#addSeat" class="btn btn-success"><span
                            class="glyphicon glyphicon-plus"></span> 添加座位</a>

                    <p class="pull-right tots buttonP">共有 <span id="tot">{{$totSeat}}</span> 条数据</p>
                    <form  name="" onsubmit="return searchSeat(this,1);" class="form-inline pull-right">
                        <div class="form-group">
                            <input type="text" name="" required class="form-control" placeholder="请输入你要搜索的内容" id="searInput">
                        </div>

                        <input type="submit" value="搜索" class="btn btn-success">
                    </form>
                </div>
                <table id="seat" class="table-bordered table table-hover">
                    <th><input type="checkbox" class="checkboxO" onclick="selectAll();" name="" id=""></th>
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
                                   data-target="#editSeat" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a
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

    <!-- 修改页面模态框 -->
    <div class="modal fade" id="editSeat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title">修改座位信息</h4>
                </div>
                <div class="modal-body" id="seatEditBody">
                    <div class="form-group">
                        <label for="">id</label>
                        <input type="text" name="name" readonly class="form-control" value="1" id="">
                        <div id="userInfo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">名字</label>
                        <input type="text" name="reserve" class="form-control" placeholder="请输入座位名字" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">描述</label>
                        <input type="text" name="reserve" class="form-control" placeholder="请输入座位大致介绍" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="">状态</label>
                       <br>
                        <input type="radio" name="reserve"  placeholder="请输入座位状态" id="">
                        <input type="radio" name="reserve"  placeholder="请输入座位状态" id="">
                        <input type="radio" name="reserve"  placeholder="请输入座位状态" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="">开始时间</label>
                        <input type="text" name="reserve" class="form-control" placeholder="请输入预约开始时间" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="">结束时间</label>
                        <input type="text" name="reserve" class="form-control" placeholder="请输入预约结束时间" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="">预约学生</label>
                        <input type="email" name="reserve" class="form-control" placeholder="请输入预约人" id="">
                        <div id="passInfo">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="">创造时间</label>
                        <input type="text" name="reserve" class="form-control" readonly id="">
                    </div>
                    <div class="form-group">
                        <label for="">更新时间</label>
                        <input type="text" name="reserve" class="form-control" readonly id="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="提交" onclick="addSeat()" class="btn btn-success">
                        <input type="reset" id="" value="重置" class="btn btn-danger">
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



@endsection
