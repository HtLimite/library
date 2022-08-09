<!--    student        -->
@extends('Admin.public')

@section('main')
    <div class="col-md-10">
<div id="studentData" >
    <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
        <li><a id="title1" href="#">学生管理</a></li>
        <li id="title2" class="active">学生列表</li>
        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span>
        </button>
    </ol>
    <!-- 面版 -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
            <!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
{{--            <a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span--}}
{{--                    class="glyphicon glyphicon-plus"></span> 添加管理员</a>--}}

            <p class="pull-right tots buttonP">共有 <span id="tot">{{$totStu}}</span> 条数据</p>
            <form action="" class="form-inline pull-right">
                <div class="form-group">
                    <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                </div>

                <input type="submit" value="搜索" class="btn btn-success">
            </form>
        </div>
        <table id="student" style="" class="table-bordered table table-hover">
            <th><input type="checkbox" name="" id=""></th>
            <th>ID</th>
            <th>account</th>
            <th>email</th>
            <th>是否激活</th>
            <th>头像</th>
            <th>注册时间</th>
            <th>上次登录时间</th>
            <th>状态</th>


            @foreach($student as $value)
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->account}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->is_verification}}</td>
                    <td><img src="../{{$value->avatar}}" style="width: 70px;"></td>
                    <td>{{$value->reg}}</td>
                    <td>{{$value->log}}</td>


                    @if(!$value->status)
                        <td><span class="btn btn-danger" onclick="status(this,{{$value->id}},1)">禁用</span>
                        </td>
                    @else
                        <td><span class="btn btn-success" onclick="status(this,{{$value->id}},0)">正常</span>
                        </td>
                    @endif

                    <td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal"
                           data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a
                            href="javascript:;" onclick="deletes(this,{{$value->id}})"
                            class="glyphicon glyphicon-trash"></a></td>
                </tr>
            @endforeach


        </table>
        <div class="panel-footer">
            {{ $student->links() }}
        </div>
    </div>
</div>
    </div>
@endsection
