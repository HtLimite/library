   <style>
       .seatBlock{
           width: 20%;

       }

       .seatNav > ul > li >i{
           font-size: 23px;
       }

       .seatDiv{
           display: flex;
           justify-content: space-between;
       }
       .seatNav > ul{
           display: flex;
       }
       .seatNav > ul > li{
           margin-left: 27px;
       }
   </style>
    <div class="box-content" id="seatInfo">
        <div class="seatDiv">
        <div><h3 class="widget-title"><i class="fa-solid fa-table "></i>  座位信息</h3>
        </div>
        <div class="seatNav"><ul>
                <li><i class="fa-solid fa-list-ul"></i></li>
                <li><i class="fa-solid fa-sitemap"></i></li>
                <li><i class="fa-solid fa-magnifying-glass-location"></i></li>
                <li><i class="fa-regular fa-calendar-check"></i></li>
                <li><i class="fa-solid fa-book-open"></i></li>
            </ul></div>
        </div>
        <div class="row">


            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock" style=" filter: drop-shadow( 10px 10px 5px #0c5460);">
                <div class="project-item">
                    <img src="/index/images/2.jpg" alt="">
                        <h4>未使用</h4>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                <div class="project-item">
                    <img src="/index/images/3.jpg" alt="" style="filter: opacity(0.4);">
                        <h4>预约中...</h4>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock" style="filter: drop-shadow(10px 10px 5px #b04b40)">
                <div class="project-item">
                    <img src="/index/images/4.jpg" alt="">
                        <h4>已预约</h4>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                <div class="project-item">
                    <img src="/index/images/6.jpg" alt="" style=" filter:grayscale(80%);">
                        <h3>使用中</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                <div class="project-item">
                    <img src="/index/images/5.jpg" alt="" style=" filter:blur(3px);">
                        <h4>离开</h4>
                </div>
            </div>

            @foreach($seatInfo as $info)


                @switch($info->status)


                    @case("未使用")
                    <div class="col-md-4 col-sm-6 col-xs-12 seatBlock" style=" filter: drop-shadow( 10px 10px 5px #0c5460);">
                        <div class="project-item">
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
                    <div class="col-md-4 col-sm-6 col-xs-12 seatBlock" style="filter: drop-shadow(10px 10px 5px #b04b40)">
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


        <div class="project-pages">
            <ul>
                @if($page <= 1)
                    <li><a href="javascript:;" style="cursor:no-drop;"><i
                                class="fa-solid fa-angle-left"></i></a></li>
                @else
                    <li><a href="javascript:;" onclick="page({{ $page - 1 }});"><i
                                class="fa-solid fa-angle-left"></i></a>
                    </li>
                @endif



                @if($page >= 10)

                    <li><a href="javascript:;" onclick="page({{1}});">{{1}}</a></li>
                    <li><a href="javascript:;" onclick="page({{2}});">{{2}}</a></li>
                    <li><a href="javascript:;" style="cursor: no-drop">...</a></li>

                @else
                @endif



                @if($page <= 9)
                    @for($i = 1 ;$i <= 13 ;$i ++)
                        @if($i == $page)
                            <li><a href="javascript:;"
                                   style=" background: #5cb48e; color: white;">{{$i}}</a></li>
                            @continue
                        @endif
                        <li><a href="javascript:;" onclick="page({{$i}});">{{$i}}</a></li>
                    @endfor
                @endif
                @if($page < 13  && $page > 9)
                    @for($i = $page-3;$i <= $pageTot ;$i++)
                        @if($page == $i)
                            <li><a href="javascript:;"
                                   style=" background: #5cb48e; color: white;">{{$i}}</a></li>
                            @continue
                        @endif
                        <li><a href="javascript:;" onclick="page({{$i}});">{{$i}}</a></li>
                    @endfor
                @elseif($page <= 20  && $page >= 13)
                    @for($i = $page-10;$i <= $pageTot ;$i++)
                        @if($page == $i)
                            <li><a href="javascript:;"
                                   style=" background: #5cb48e; color: white;">{{$i}}</a></li>
                            @continue
                        @endif
                        <li><a href="javascript:;" onclick="page({{$i}});">{{$i}}</a></li>
                    @endfor

                @endif







                @if($pageTot - $page > 10)

                    <li><a href="javascript:;" style="cursor: no-drop">...</a></li>
                    <li><a href="javascript:;" onclick="page({{$pageTot-1}});">{{$pageTot-1}}</a></li>
                    <li><a href="javascript:;" onclick="page({{$pageTot}});">{{$pageTot}}</a></li>
                @else
                @endif




                @if($page >= $pageTot)
                    <li><a href="javascript:;" style="cursor:no-drop;"><i
                                class="fa-solid fa-angle-right"></i></a></li>
                @else
                    <li><a href="javascript:;" onclick="page({{  $page +1 }});"><i
                                class="fa-solid fa-angle-right"></i></a></li>
                @endif


            </ul>
        </div>
    </div>

