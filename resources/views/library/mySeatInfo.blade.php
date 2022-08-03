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
            <div>{{$mySeatInfo->status}}</div>
        </div>
    </div>
</div>
<!--我的信息侧边栏-->
<div class="col-md-4 col-sm-4">
    <div class="box-content">
        <h3 class="widget-title">About Lim</h3>
        <p></p>
        <div class="about-social">
            <ul>
                <li>
                    <a class="fa-solid fa-gear" title="设置"></a>
                </li>
                <li>
                    <a href="javascript:;" title="修改" onclick="editSeatInfo({{$mySeatInfo->id}});"
                       class="fa-solid fa-pen-to-square"></a>
                </li>
                <li>
                    <a href="javascript:;" title="暂时离开" onclick="leaveReserve(this,'{{$mySeatInfo->id}}')" class="fa-regular fa-circle-stop"></a>
                </li>
                <li>
                    <a href="javascript:;" title="结束使用" id="endB"
                       onclick="endReserve('{{$mySeatInfo->id}}','{{$mySeatInfo->student}}');"
                       class="fa-solid fa-person-walking-arrow-right"></a>
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

                    <h1><i class="fa-solid fa-book-open-reader"></i> <span class="editH1">修改预约</span></h1>
                    <form class="" id="yuyueForm" onsubmit="return yuEdit('修改','{{csrf_token()}}');">
                        <div>
                            <h2 class="seatId">座位号</h2>
                            <div class="numSeat numSeatE">{{$mySeatInfo->id}}</div>
                        </div>
                        <!--座位状态修改 -->
                        <div id="seatEdit">
                            <fieldset>
                                <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                                    <span>开始时间</span>
                                    <input id="EbeginT" autocomplete="off" required value="{{$mySeatInfo->beginT}}">
                                </div>
                                <div class="clockpicker"><i class="fa-regular fa-clock"></i>
                                    <span>结束时间</span>
                                    <input required id="EendT" autocomplete="off" class="endInput"
                                           value="{{$mySeatInfo->endT}}">
                                </div>
                            </fieldset>

                            <fieldset>
                                <p class="timeType"><span>&nbsp;有效预约时间:8:00-23:00</span></p>
                            </fieldset>

                            <fieldset>
                                <div class="endDiv">
                                    <button type="button" class="action butYuyue" data-dialog-close>关闭</button>
                                    <input type="submit" class="butYuyue" id="editB" value="修改">
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    //删除 结束使用
    function endReserve(id, student) {
        //button响应
        $("#endB").css('background', '#777');
        $.post("reserve/" + id, {_method: "delete", id: id, _token: '{{csrf_token()}}'}, function (data) {
            if (data == 1) {
                //成功恢复响应
                $("#endB").css('background', '#dddddd');
                spop({
                    template: '<h4 class="spop-title">已结束!</h4>',
                    position: 'top-center',
                    style: 'success',
                    autoclose: 2000,
                });
                myMessage(student);
                EscClose();
            } else {
                spop({
                    template: '<h4 style="collapse: red" class="spop-title">失败!</h4>',
                    position: 'top-center',
                    style: 'error',
                    autoclose: 2000,
                });
            }
        });
    }
    //暂时离开
    function leaveReserve(obj,id){
        //页面灰度响应
        $("body").css('filter', 'grayscale(30%)');

        $.post("reserve/" + id, {_method: "PATCH", id: id, _token: '{{csrf_token()}}'}, function (data) {
            if (data == 1) {
                //成功完全灰度
                $("body").css('filter', 'grayscale(100%)');
                spop({
                    template: '<h4 class="spop-title">离开中...</h4>',
                    position: 'top-center',
                    style: 'success',
                    autoclose: 3000,
                });
                myMessage(student);
            }else if(data == 2){
                //使用中
                spop({
                    template: '<h4 style="collapse: red" class="spop-title">欢迎回来!</h4>',
                    position: 'top-center',
                    style: 'success',
                    autoclose: 3000,
                });
                //失败 恢复
                myMessage(student);
                $("body").css('filter', '');
        }else {
                spop({
                    template: '<h4 style="collapse: red" class="spop-title">失败!</h4>',
                    position: 'top-center',
                    style: 'error',
                    autoclose: 2000,
                });
                //失败 恢复
                $("body").css('filter', '');
            }
        });
    }

    //模拟时间表盘
    $('.clockpicker').clockpicker()
        .find('input').change(function () {
        // TODO：时间改变
        // console.log(this.value);
    });


</script>
