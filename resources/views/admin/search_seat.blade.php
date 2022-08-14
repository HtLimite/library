<div class="panel panel-default">
    <div class="panel-heading">
        <button id="" onclick="deleteAll('seat','{{csrf_token()}}');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除
        </button>
<span style="margin-left: 30px;">搜索&nbsp;{{$searText}}&nbsp;结果如下</span>

        <p class="pull-right tots buttonP">共有 <span id="tot">{{$total}}</span> 条数据</p>
        <form  name="" onsubmit="return searchSeat(this,1);" class="form-inline pull-right">
            <div class="form-group">
                <input type="text" name="" value="{{$searText}}" required class="form-control" placeholder="请输入你要搜索的内容" id="searInput">
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

        @foreach($result as $va  => $value)
            <tr>
                <td><input value="{{$value->id}}" type="checkbox" class="checkbox" name="" id=""></td>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->status}}</td>
                <td>{{$value->student}}</td>
                <td>{{$value->beginTime}}---{{$value->endTime}}</td>


                <td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal"
                       data-target="#editSeat" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a
                        href="javascript:;" onclick="deletes(this,{{$value->id}})"
                        class="glyphicon glyphicon-trash"></a></td>
            </tr>
        @endforeach

    </table>
    <div class="panel-footer">
    <ul class="pagination" role="navigation">
{{--        <li class="page-item active" aria-current="page"><span class="page-link">首页</span></li>--}}
        <li class="page-item"><a class="page-link" href="javascript:;" onclick="searchSeat(this,1)" >首页</a></li>
        @if($page <= 1)
            <li class="page-item"><a class="page-link" href="javascript:;" style="cursor: no-drop"  >第一页</a></li>
        @else
            <li class="page-item"><a class="page-link" href="javascript:;" onclick="searchSeat(this,{{ $page - 1 }})" >上一页</a></li>

        @endif

        @if($page == $pageTot)
            <li class="page-item"><a class="page-link" href="javascript:;" style="cursor: no-drop" >最后页</a></li>
        @else
            <li class="page-item"><a class="page-link" href="javascript:;" onclick="searchSeat(this,{{ $page + 1 }})" >下一页</a></li>
        @endif
        <li class="page-item"><a class="page-link" href="javascript:;" onclick="searchSeat(this,{{$pageTot}})" >末页</a></li>
    </ul>
</div>
</div>
