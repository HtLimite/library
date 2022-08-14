
<!--    record        -->
<div id="recordData" >
    <ol class="breadcrumb">
        <li><a href="#"><span class="fa-solid fa-house-user"></span> 首页</a></li>
        <li><a id="title1" href="#">管理员管理</a></li>
        <li id="title2" class="active">管理员列表</li>
        <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span>
        </button>
    </ol>
    <!-- 面版 -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-danger"><span class="fa-solid fa-trash"></span> 批量删除</button>
            <!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span
                    class="glyphicon glyphicon-plus"></span> 添加管理员</a>

            <p class="pull-right tots buttonP">共有 <span id="tot">{{$totR}}</span> 条数据</p>
            <form action="" class="form-inline pull-right">
                <div class="form-group">
                    <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                </div>

                <input type="submit" value="搜索" class="btn btn-success">
            </form>


        </div>
        <table id="record" style="" class="table-bordered table table-hover">
            <th><input type="checkbox" name="" id=""></th>
            <th>ID</th>
            <th>学生</th>
            <th>预约总次数</th>
            <th>预约总时间</th>
            <th>赴约次数</th>
            <th>预约天数</th>

            @foreach($record as $value)
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->total_num}}</td>
                    <td>{{$value->total_time}}</td>
                    <td>{{$value->integrity}}</td>
                    <td>{{$value->total_day}}</td>


                    <td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal"
                           data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a
                            href="javascript:;" onclick="deletes(this,{{$value->id}})"
                            class="glyphicon glyphicon-trash"></a></td>
                </tr>
            @endforeach


        </table>
    </div>
</div>
