<script src="/seat/my.js"></script>

<div class="box-content" id="seatInfo">
    <!--导航菜单-->
    <div class="seatDiv" id="seatNav">
        <div><h3 class="widget-title"><i class="fa-solid fa-table "></i> 座位信息</h3>
        </div>
        <div class="seatNav">
            <ul>
                <li id="seatType"><i class="fa-solid fa-list-ul"></i></li>
                <li><i class="fa-solid fa-sitemap"></i></li>
                <li><i class="fa-solid fa-magnifying-glass-location"></i></li>
                <li><i class="fa-regular fa-calendar-check"></i></li>
                <li><i class="fa-solid fa-book-open"></i></li>
            </ul>
            <div class="seatType" id="seatType">
                <ul>
                    <li id="weishiyong"><i class="fa-solid fa-square-check"></i> 未使用</li>
                    <li id="yuyuezhong"><i class="fa-solid fa-arrows-rotate"></i> 预约中...</li>
                    <li id="yiyuyue"><i class="fa-regular fa-clock"></i> 已预约</li>
                    <li id="shiyongzhong"><i class="fa-regular fa-circle-xmark"></i> 使用中</li>
                    <li id="likai" style="border: none"><i class="fa-regular fa-circle-pause"></i> 离开</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <!--vue轮播图-->
        <div id="app">
            <div class="box">
                <!--<button @click="imgMove">点击</button>-->
                <div class="main clearfix" @mouseover="btnOpen" @mouseout="btnHide">
                    <div class="minMain">
                        <div class="item" v-for="(item,index) in list" :key="index">
                            <div class="img-div" v-bind:style="item.div">
                                <div class="top-text"><h3 v-text="item.text"></h3></div>
                                <img :src="item.imgUrl" v-bind:style="item.style"/>
                            </div>
                        </div>
                        <div class="btnMain" v-show="btnShow">
                            <div class="left" @click="leftClick">
                                <img src="/seat/lunbo/ljiantou.png"/>
                            </div>
                            <div class="right" @click="rightClick">
                                <img src="/seat/lunbo/rjiantou.png"/>
                            </div>
                        </div>
                        <div class="pressMain">
                            <span v-for="(item,index) in pressList" :class="{active:item.isShow}"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--vue轮播图js-->
        <script src="/seat/lunbo/vue.min.2.2.2.js"></script>
        <script src="/seat/lunbo/lunbo.js"></script>
        <!--座位信息-->
        <div id="seatOne">
            <div id="seatTop">
                <div class="col-md-4 col-sm-6 col-xs-12 seatBlock"
                     style=" filter: drop-shadow( 10px 10px 5px #0c5460);">
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
                        <img src="/index/images/5.jpg" alt="" style=" filter:grayscale(80%);">
                        <h3>使用中</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 seatBlock">
                    <div class="project-item">
                        <img src="/index/images/6.jpg" alt="" style=" filter:blur(3px);">
                        <h4>离开</h4>
                    </div>
                </div>
            </div>
            <div id="dataSeat">
                <!--循环数据-->
                <div id="forSeat">
                    @foreach($seatInfo as $info)


                        @switch($info->status)


                            @case("未使用")
                            <div class="col-md-4 col-sm-6 col-xs-12 seatBlock"
                                 style=" filter: drop-shadow( 10px 10px 5px #0c5460);">
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
                            @for($i = $page-7;$i <= $pageTot ;$i++)
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
        </div>

    </div>
</div>





