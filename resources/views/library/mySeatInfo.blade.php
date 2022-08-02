{{--<div class="row" id="leftDiv">--}}
<!--我的预约信息-->
<script type="text/javascript" src="/seat/bootstrap-clockpicker.js"></script>

<div class="col-md-8 col-sm-8">
    <div class="box-content profile">

        <h3 class="widget-title"><i class="fa-solid fa-user-clock"></i>&nbsp;&nbsp;我的信息</h3>
        <div class="profile-thumb">
            <img src="/index/images/8.jpg" alt="">
        </div>
        <div class="profile-content">
            <h5 class="profile-name"><i class="fa-solid fa-envelope">&nbsp;邮箱</i>{{$mySeatInfo->student}}
            </h5>
            <span class="profile-role"></span>
            <div class="myLi" id="myLi">
                <ul>
                    <li><i class="fa-solid fa-chair"></i>&nbsp;座位号<span>{{$mySeatInfo->id}}</span></li>
                    <li><i class="fa-regular fa-hourglass"></i>&nbsp;预约时间</li>
                    <li><i class="fa-solid fa-clock"></i>&nbsp;{{$mySeatInfo->beginTime}}</li>
                    <li><i class="fa-solid fa-clock"></i>&nbsp;{{$mySeatInfo->endTime}}</li>
                </ul>
            </div>
        </div>
        <div class="myBottomDiv">
            <div class="profile-content-seatOne">
                <div class="progressbar"></div>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="profile-content-seatTwo">
                <ul>
                    <li>已预约</li>
                    <li>使用中</li>
                    <li>已结束</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--我的信息侧边栏-->
<div class="col-md-4 col-sm-4">
    <div class="box-content">
        <h3 class="widget-title">Background</h3>
        <p>Vestibulum pellentesque ante sit amet tristique hendrerit. Sed consequat, nunc
            lobortis faucibus pretium, enim nibh blandit est, nec sollicitudin est quam a neque.
            Aenean eget malesuada justo.</p>
        <div class="about-social">
            <ul>
                <li>
                    <a class="fa-solid fa-gear"></a>
                </li>
                <li>
                    <a href="#" onclick="editSeatInfo({{$mySeatInfo->id}});" class="fa-solid fa-pen-to-square"></a>
                </li>
                <!--座位状态修改 -->
                <div id="seatEdit" style="display: none">
                    <fieldset>
                        <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                            <span>开始时间</span>
                            <input id="beginT" autocomplete="off" required value="{{$mySeatInfo->beginTime}}">
                        </div>
                        <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                            <span>结束时间</span>
                            <input required id="endT" autocomplete="off" class="endInput" value="{{$mySeatInfo->endTime}}">
                        </div>
                    </fieldset>

                    <fieldset>
                        <p class="timeType"><span>&nbsp;有效预约时间:8:00-23:00</span></p>
                    </fieldset>

                    <fieldset>
                        <div class="endDiv" >
                            <button onclick="EscClose();" class="action butYuyue"
                                    data-dialog-close>关闭
                            </button>

                            <input type="submit" class="butYuyue" onclick=""
                                   id=""
                                   value="修改">
                            <input type="submit" class="butYuyue" onclick=""
                                   id="bn"
                                   value="结束">
                        </div>
                    </fieldset>
                </div>
                <li>
                    <a href="#" class="fa fa-linkedin"></a>
                </li>
                <li>
                    <a href="#" class="fa fa-dribbble"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
{{--</div>--}}
<!-- css3 svg弹窗 全局-->
<div id="cssTan">
    <div class="button-wrap" style="display: none">
        <button data-dialog="somedialog" class="triggerEdit">Open Dialog</button>
    </div>
    <div id="somedialog" class="dialog">
        <div class="dialog__overlay"></div>
        <div class="dialog__content" style="padding-top: 0;">
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
            <div class="dialog-inner">

                <div class="input ">

                    <h1><i class="fa-solid fa-book-open-reader"></i> <span class="editH1">预约</span></h1>
                    <form class="" id="yuyueForm" onsubmit="return yuue(this);">
                        <div>
                            <h2 class="seatId">座位号</h2>
                            <div class="numSeat">{{$mySeatInfo->id}}</div>
                        </div>
                        <div id="seatEdit" >
                            <fieldset>
                                <div class="clockpicker clockpicke"><i class="fa-regular fa-clock"></i>
                                    <span>开始时间</span>
                                    <input id="beginT" autocomplete="off" required value="{{$mySeatInfo->beginTime}}">
                                </div>
                                <div class="clockpicker clockpicke"><i class="fa-regular fa-clock"></i>
                                    <span>结束时间</span>
                                    <input required id="endT" autocomplete="off" class="endInput" value="{{$mySeatInfo->endTime}}">
                                </div>
                            </fieldset>

                            <fieldset>
                                <p class="timeType"><span>&nbsp;有效预约时间:8:00-23:00</span></p>
                            </fieldset>

                            <fieldset>
                                <div class="endDiv" >
                                    <button  class="action butYuyue"
                                            data-dialog-close>关闭
                                    </button>

                                    <input type="submit" class="butYuyue" onclick=""
                                           id=""
                                           value="修改">
                                    <input type="submit" class="butYuyue" onclick=""
                                           id="bn"
                                           value="结束">
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>
<script>

    $(".clockpicke").clockpicker()
        .find('input').change(function () {
    });

</script>
