

<h2 style="margin: 70px auto;text-align: center;font-size: 27px;">搜索{{$value}}结果如下:</h2>


<!--循环数据-->
<div id="forSeat">
    @foreach($seatInfo as $info)


        @switch($info->status)


            @case("未使用")
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock"
                 style=" filter: drop-shadow( 10px 10px 5px #0c5460);">
                <div class="project-item " style="cursor: pointer" onclick="yuyueForm({{$info->id}});">
                    <img src="/index/images/1.jpg" alt="">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->status }}</h4>
                    </div>
                </div>
            </div>
            @break
            @case("预约中")
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                <div class="project-item">
                    <img src="/index/images/1.jpg" alt="" style=" filter:opacity(0.4);">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->status }}...</h4>
                    </div>
                </div>
            </div>
            @break
            @case("已预约")
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock"
                 style="filter: drop-shadow(10px 10px 5px #b04b40)">
                <div class="project-item">
                    <img src="/index/images/1.jpg" alt="">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->status }}</h4>
                    </div>
                </div>
            </div>
            @break

            @case("使用中")
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock" style=" filter:grayscale(80%);">
                <div class="project-item">
                    <img src="/index/images/1.jpg" alt="">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->status }}</h4>
                    </div>
                </div>
            </div>
            @break
            @case("离开")
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                <div class="project-item">
                    <img src="/index/images/1.jpg" alt="" style=" filter:blur(3px);">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->status }}</h4>
                    </div>
                </div>
            </div>
            @break
        @endswitch
    @endforeach
</div>
<!--  分页  -->
<div class="project-pages">
    <ul>
        @if($page <= 1)
            <li><a href="javascript:;" style="cursor:no-drop;"><i
                        class="fa-solid fa-angle-left"></i></a></li>
        @else
            <li><a href="javascript:;" onclick="searchAjax({{ $page - 1}} ,false);"><i
                        class="fa-solid fa-angle-left"></i></a>
            </li>
        @endif



        @for($i = 1 ;$i <= $pageTot ;$i ++)
            @if($i == $page)
                <li><a href="javascript:;"
                       style=" background: #5cb48e; color: white;">{{$i}}</a></li>
                @continue
            @endif
            <li><a href="javascript:;" onclick="searchAjax({{$i}},false)">{{$i}}</a></li>
        @endfor





        @if($page >= $pageTot)
            <li><a href="javascript:;" style="cursor:no-drop;"><i
                        class="fa-solid fa-angle-right"></i></a></li>
        @else
            <li><a href="javascript:;" onclick="searchAjax({{  $page +1 }},false);"><i
                        class="fa-solid fa-angle-right"></i></a></li>
        @endif


    </ul>
</div>
