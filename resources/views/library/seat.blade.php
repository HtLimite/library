<div class="box-content" id="seatInfo">
    <h3 class="widget-title">Past Projects</h3>
    <div class="row">

        @foreach($seatInfo as $info)

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project-item">
                    <img src="/index/images/1.jpg" alt="">
                    {{$info->id}}
                    <div class="project-hover">
                        <h4>{{ $info->name }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="project-item">
                <img src="/index/images/2.jpg" alt="">
                <div class="project-hover">
                    <h4>Another Image Caption</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="project-item">
                <img src="/index/images/3.jpg" alt="">
                <div class="project-hover">
                    <h4>Great Nature Capture</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="project-item">
                <img src="/index/images/4.jpg" alt="">
                <div class="project-hover">
                    <h4>Another Image Caption</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="project-item">
                <img src="/index/images/5.jpg" alt="">
                <div class="project-hover">
                    <h4>Great Nature Capture</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="project-item">
                <img src="/index/images/6.jpg" alt="">
                <div class="project-hover">
                    <h4>Another Image Caption</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="project-pages">
        <ul>
            @if($page <= 1)
                <li><a href="javascript:;" style="cursor:no-drop;"><i class="fa-solid fa-angle-left"></i></a></li>
            @else
                <li><a href="javascript:;" onclick="page({{ $page - 1 }});"><i class="fa-solid fa-angle-left"></i></a>
                </li>
            @endif

            @if( $page >= 7)
                <li><a href="javascript:;" style="cursor: no-drop">...</a></li>
            @endif

            @for($i = 1 ; $i < 10 ;$i ++)
                @if($i == $page)
                    <li><a href="javascript:;" style="background: #5cb48e; color: white;" onclick="page({{$i}});">{{$i}}</a></li>
                    @continue
                @endif
                <li><a href="javascript:;" onclick="page({{$i}});">{{$i}}</a></li>
            @endfor

            @if($pageTot - $page >= 7)
                <li><a href="javascript:;" style="cursor: no-drop">...</a></li>


                <li><a href="javascript:;" onclick="page({{$pageTot-1}});">{{$pageTot-1}}</a></li>
                <li><a href="javascript:;" onclick="page({{$pageTot}});">{{$pageTot}}</a></li>
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

