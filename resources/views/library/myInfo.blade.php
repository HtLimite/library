<!--我的信息-->
<div class="col-md-8 col-sm-8 bigqi1">
    <div class="box-content profile" style="height: 333px">

        <h3 class="widget-title"><i class="fa-solid fa-user-clock"></i>&nbsp;&nbsp;我的信息</h3>
        <div class="profile-thumb">
            @if($studentInfo->avatar == null)
                <img class="picMy" src="/index/images/8.jpg" alt="">
            @else
                <img class="picMy" src="{{$studentInfo->avatar}}" alt="">
            @endif
        </div>
        <div class="profile-content">
            <h5 style="font-size: 17px;" class="profile-name"><i class="fa-solid fa-envelope">&nbsp;邮箱</i>
                <span>{{$studentInfo->email}}</span>
            <span class="profile-role"></span>
            <div class="myLi" id="myLi">
                <ul>无预约信息</ul>
            </div>
        </div>
</div>
</div>
<!--我的信息侧边栏-->
<div class="col-md-4 col-sm-4 bigqi"  >
    <div class="box-content">
        <h3 class="widget-title">About Lim</h3>
        <p> Lim&nbsp; 是英文&nbsp; Limite&nbsp; 的缩写，是极限的意义，象征着无限趋近，无限趋近于光、无限趋近于美好...... <br><br>无限向往着&nbsp; <strong>Lim</strong>. </p>
        <div class="about-social">
            <ul>
                <li>
                    <a href="javascript:;" class="fa-solid fa-gear" onclick="picUp();" title="设置"></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-sm-5">
        <div class="box-content">
            <h3 class="widget-title">Library Environment</h3>
            <div class="project-item">
                <img src="/index/images/7.jpg" alt="">
                <div class="project-hover">
                    <h4>Quiet Clean Comfortable</h4>
                </div>
            </div>
        </div>
    </div>
    @if(!$record == null)
    <div class="col-md-7 col-sm-7">
        <div class="box-content">
            <h3 class="widget-title">近来预约记录</h3>
            <ul class="progess-bars">
                <li>
                    <span><i class="fa-solid fa-magnifying-glass-minus">  预约总小时 &nbsp; &nbsp;  {{$record->total_time}}小时</i></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100" style="width: {{$record->total_time}}%;"></div>
                    </div>
                </li>
                <li>
                    <span><i class="fa-solid fa-arrow-right-arrow-left">  预约总次数 &nbsp; &nbsp;  {{$record->total_num}}次</i></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="95"
                             aria-valuemin="0" aria-valuemax="100" style="width: {{$record->total_num}}%;"></div>
                    </div>
                </li>
                <li>
                    <span><i class="fa-solid fa-check">  赴约次数 &nbsp; &nbsp;  {{$record->integrity}}次</i></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                             aria-valuemin="0" aria-valuemax="100" style="width: {{$record->integrity}}%;"></div>
                    </div>
                </li>
                <li>
                    <span><i class="fa-regular fa-calendar-check">  预约天数&nbsp; &nbsp; {{$record->total_day}}天</i></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100" style="width: {{$record->total_day}}%;"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @endif

</div>
<!-- css3 svg弹窗  个人信息-->
<div id="pictureT">
    <div class="button-wrap" style="display: none">
        <button data-dialog="pictureTan" class="triggerPic">Open Dialog</button>
    </div>
    <div id="pictureTan" class="dialog">
        <div class="dialog__overlay"></div>
        <div class="dialog__content" style="max-width: 655px;width: 600px">
            <div class="morph-shape"
                 data-morph-open="M0,0h80c0,0,0,9.977,0,29.834c0,19.945,0,30.249,0,30.249H0c0,0,0-10.055,0-30.332C0,8.219,0,0,0,0z"
                 data-morph-close="M0,29.75h80c0,0-3.083,0.014-3.083,0.041c0,0.028,3.083,0.042,3.083,0.042H0c0,0,3.084-0.014,3.084-0.042
	C3.084,29.762,0,29.75,0,29.75z">
                <svg width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
                    <path d="M0,29.75h80c0,0-3.083,0.014-3.083,0.041c0,0.028,3.083,0.042,3.083,0.042H0c0,0,3.084-0.014,3.084-0.042
	C3.084,29.762,0,29.75,0,29.75z"></path>
                </svg>
            </div>

            <!--内容-->
            <div class="picDiv">
                <div class="closePic"><i class="fa-solid fa-xmark" data-dialog-close></i></div>
                <div class=" ">
                    <form class="picF" id="" onsubmit="return false;">
                        <h3>我的头像</h3>
                        <div class="imgDisplay">
                            <img class="picMy" src="{{$studentInfo->avatar}}" alt="">
                        </div>
                        <div class="imgDisplay" id="picDragenter" onclick="picClick();" style="cursor: pointer">
                            <div>
                                <img id="picUpImg" src="">
                                <i class="fa-solid fa-plus"></i>  <p>将图片拖进此处<span>即可上传</span></p>
                            </div>
                        </div>
                        <fieldset class="picBut">
                            <input type="file" onchange="pictureUpJs();" id="pictureFile"  style="display: none">
                            <button type="button" id="selectPic" onclick="picClick();" class="action butYuyue" >选择图片</button>
                            <button type="button" onclick="pictureUp('{{csrf_token()}}')" id="uploadPic" class="action butYuyue" style="display: none" >上传图片</button>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

