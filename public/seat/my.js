//座位状态筛选
$("#seatType").click(function () {
    $(".seatType").slideToggle();
});
$(".seatType").hover(function () {

}, function () {
    $(".seatType").slideUp(1000);
})

//搜索框展示
let searBut = $("#searchI");
searBut.click(function () {
    $(".searchLi").nextAll().hide();
    $(".seatType").hide();
    $(".searchLi").css("margin-right", "233px");
});
$(".close").click(function () {
    $(".searchLi").nextAll().show(700)
    $(".searchLi").css("margin-right", "0");
});

//button 绑定事件处理
function searchToggle(obj, evt) {
    var container = $(obj).closest('.search-wrapper');


    if (!container.hasClass('active')) {
        container.addClass('active');
        $("#searchI").css("display", "none");
        $("#searchI1").css("display", "block");
        evt.preventDefault();

    } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {

        $("#searchI1").css("display", "none");

        $("#searchI").css("display", "block");

        container.removeClass('active');
        // clear input
        container.find('.search-input').val('');
        // clear and hide result container when we press close
        container.find('.result-container').fadeOut(100, function () {
            $(this).empty();
        });
    }
}

//button submit 属性不生效 input 隐藏域
function subSearch1() {
    $("#subSear").click();
}

//搜索结果传递查询
//函数节流
let lock = true;


function submitFn(obj, evt) {
    //获取结果,去除所有空格
    value = $('.search-input').val().replace(/\s+/g, "");
    //ajax搜索结果
    //防sql注入
    var regex = /^(.*)(select|insert|into |delete|from |count|drop|join|union|table|database|update|truncate|asc\(|mid\(|char\(|xp_cmdshell|exec |master|net localgroup administrators|\"|:|net user|\| or )(.*)$/gi;
    if (value === "") {
        return;
    }
    if (regex.test(value)) {
        //sql注入成功
        spop({
            template: '<h4 style="color: red" class="spop-body">当你看到这条信息时,摄像头前的你正在犯罪!</h4>',
            position: 'bottom-right',
            style: 'warning',
            autoclose: 7000,
        });
        return;
    }

    //函数节流验证
    if (lock) {
        //验证通过,调用请求
        searchAjax(1, true);
        //关锁
        lock = false;
        setTimeout(function () {
            lock = true;
        }, 3000);
    }


}

//搜索ajax
function searchAjax(page, bool) {
    var bool = bool;
    $.get(' library/{1}/edit', {value: value, page: page}, function (data) {
        if (data == 0) {
            spop({
                template: '<h4 style="color: #a5fed7" class="spop-body">搜索失败!</h4>',
                position: 'bottom-right',
                style: 'error',
                autoclose: 2000,
            });
        } else {
            if (bool) {
                spop({
                    template: '<h4 style="color: black" class="spop-body">搜索成功!</h4>',
                    position: 'bottom-right',
                    style: 'success',
                    autoclose: 1000,
                });
            }
            //写进html
            $("#seatOne").html(data);
        }
    });
}


//ajax筛选结果
var filterArray = [$("#weishiyong"), $("#yuyuezhong"), $("#yiyuyue"), $("#shiyongzhong"), $("#likai")];

//for遍历键值对
for (const [index, elem] of filterArray.entries()) {

    filterArray[index].click(index, function () {

        //设置或返回被选中元素的属性
        let seatStatus = elem.attr('id');

        $.get('/library/4', {'status': seatStatus}, function (data) {
            if (data == 0) {
                spop({
                    template: '<h4 style="color: #a5fed7" class="spop-body">获取座位信息失败!</h4>',
                    position: 'bottom-right',
                    style: 'error',
                    autoclose: 2000,
                });
            } else {
                spop({
                    template: '<h4 style="color: white" class="spop-body">查询成功!</h4>',
                    position: 'bottom-center',
                    style: 'success',
                    autoclose: 1000,
                });
                //写进html
                $("#seatOne").html(data);
            }
        });
    });
}
//flex //返回顶部
$(function () {
    $(window).scroll(function () {
        var offset = $(document).scrollTop();
        if (offset >= 250) {
            $(".seatDiv").addClass("seatDiv-fixed");
        } else {
            $(".seatDiv").removeClass("seatDiv-fixed");
        }
        if (offset >= 700) {
            $(".returnTop").show();

        } else {
            $(".returnTop").hide();
        }
    });
});
$(".returnTop").click(function () {
    $('body,html').animate({scrollTop: 0}, 800);
    // $(window).scrollTop(0);
});


//预约表单弹出
//预约锁 预约成功后锁住  false
let seatLock = true;


function yuyueForm(id) {
    //函数节流
    if(!lock){
        return;
    }
    if(!seatLock){
        //预约用户
        spop({
            template: '<h4 style="color: black" class="spop-body">已预约,请结束使用后再预约</h4>',
            position: 'top-center',
            style: 'error',
            autoclose: 3000,
        });
        //关锁
        lock = false;
        setTimeout(function (){
            lock = true;
        },3000);
        return;
    }
    //弹出模态框
    $(".trigger").click();
    if (isLogined && seatLock) {
        //登录用户 和 未预约用户
        id = id;
        // str = '<div class="numSeat">'+id+'</div>';
        $(".numSeat").html(id);
        return;
    } else{
        //未登录
        let unLoginDiv = $("#unLoginDiv").html();
        $(".dialog-inner").html(unLoginDiv);
    }

}

//关闭未登录弹窗
function EscClose(e) {
    if (HTMLElement && !HTMLElement.prototype.pressKey) {
        HTMLElement.prototype.pressKey = function (code) {
            var evt = document.createEvent('UIEvents');
            evt.keyCode = code;
            evt.initEvent('keydown', true, true);
            this.dispatchEvent(evt);
        };
    }
    //主动触发ESC按键
    document.body.pressKey(27);
}

//跳转登录
function homebutton() {

    $(".homebutton").click();
    //关闭弹窗
    EscClose();
}
//时间段预约验证 参数 开始时间 结束时间 座位id
function timesVerify(begin1,end1,id){
    //获取现在时间
    var nowDate = new Date();
    //解析时间
    begin = begin1.split(":");
    end = end1.split(":");
    //是否为数字
    if(isNaN(begin[0]) || isNaN(begin[1]) || isNaN(end[0]) || isNaN(end[1])){
        spop({
            template: '<h4 style="color: #a5fed7" class="spop-body">请输入正确的时间!</h4>',
            position: 'top-center',
            style: 'error',
            autoclose: 2000,
        });
        return false;
    }
    //分钟比较
    begin[1] = Number(begin[1]);
    end[1] = Number(end[1]);
    //有效预约时间 8:00-23:00 不小于30分钟 大于此时此刻 nowDate
    if (begin[0] > end[0] || begin[0] < 8 || end[0] > 24 || begin[0] < nowDate.getHours() ) {
        spop({
            template: '<h4 style="color: #a5fed7" class="spop-body">无效的预约时间!</h4>',
            position: 'top-center',
            style: 'error',
            autoclose: 2000,
        });
        return false;
    }
    if(begin[0] == nowDate.getHours() && begin[1] <= nowDate.getMinutes()){
        //小于当前时间
        spop({
            template: '<h4 style="color: #a5fed7" class="spop-body">无效的预约时间!<br>时光倒流?</h4>',
            position: 'top-center',
            style: 'error',
            autoclose: 2000,
        });
        return false;
    }

    if ((begin[0] === end[0] && begin[1] + 30 > end[1]) || (end[0] - begin[0] == 1 && (60 - begin[1] + end[1]) < 30  )) {
        spop({
            template: '<h4 style="color: #a5fed7" class="spop-body">预约时间不能短于30分钟!</h4>',
            position: 'top-center',
            style: 'error',
            autoclose: 2000,
        });
        return false;
    }
    return [id,begin1,end1];
}

//预约
function yuYue(message,_token) {
    //获取值
    var begin1 = $("#beginT").val();
    var end1 = $("#endT").val();
    var id = $(".numSeat").text();
    //时间段验证
    let Formdata = timesVerify(begin1, end1, id);
    //接收返回值
    var id = Formdata[0],
        begin = Formdata[1],
        end = Formdata[2];
    //ajax
    if(Formdata){
        updateAjax(message,id,begin,end,_token);

    }
    return false;

}

//post  ajax 更新
function updateAjax(message,id,begin,end,_token){
    //验证通过ajax预约
    //button中...
    var value = message + '中...';
    $("#bn1").attr({'value': value});
    $("#bn1").css('background-image', 'linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%)');
    //ajax
    //函数节流
    if(!true){
        return ;
    }
    $.post('/reserve', {id: id, beginTime: begin, endTime: end, _token:_token}, function (data) {
        if (data[0] == 1) {
            spop({
                template: '<h4 style="color: #a5fed7" class="spop-body">'+message+'成功</h4>',
                position: 'top-center',
                style: 'success',
                autoclose: 3000,
            });
            // ajax刷新
            page(1, true);
            // window.location.reload("#adminTable");

            //button变化
            value = '已'+message;
            $("#bn1").attr({'value': value});
            $("#bn1").css('background-image', '');
            //跳转我的信息
            logo();
            //我的信息
            EscClose();
            myMessage(data[1]);

        } else {
            spop({
                template: '<h4 style="color: #a5fed7" class="spop-body">'+message+'失败,请稍后再试!</h4>',
                position: 'top-center',
                style: 'error',
                autoclose: 3000,
            });
            $("#bn1").attr({'value': message});
            $("#bn1").css('background-image', '');
            //关锁
            lock = false;
            setTimeout(function (){
                lock = true;
            },3000);
        }
    });
    return false;
}

//我的信息
function myMessage(student) {
    //展示我的信息
    if (student == "") {
        //未登录用户
        str = '<h1 class="unLoginH3"><i class="fa-solid fa-user-xmark"></i>&nbsp;&nbsp;您未登录,请登录后查看</h1>';
        $("#leftDiv").html(str);
        return;
    }
    $.get("/reserve/" + student, function (data) {
        if (data == 0) {
            str = '<h1 class="unLoginH3"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;' + student + '<br><br><br>无预约信息</h1>';
            $("#leftDiv").html(str);
        } else {
            //写进我的展示页面
            $("#leftDiv").html(data);
            //锁住预约表单
            seatLock = false;
        }
    });
}

//编辑预约信息
function editSeatInfo(id){
    //弹窗调用
    TanChuang();
    $(".triggerEdit").click();

}
//图片上传弹窗
function picUp(){
    //弹窗调用
    let cssTan = $("#cssTan");
    cssTan.remove();
    TanChuang();
    $(".triggerPic").click();
    $("#mySide").append(cssTan);
}
// {{--            弹窗--}}
 function  TanChuang () {
    (function () {
        var dlgtrigger = document.querySelector('[data-dialog]'),
            somedialog = document.getElementById(dlgtrigger.getAttribute('data-dialog')),
            // svg..
            morphEl = somedialog.querySelector('.morph-shape'),
            s = Snap(morphEl.querySelector('svg')),
            path = s.select('path'),
            steps = {
                open: morphEl.getAttribute('data-morph-open'),
                close: morphEl.getAttribute('data-morph-close')
            },
            dlg = new DialogFx(somedialog, {
                onOpenDialog: function (instance) {
                    // animate path
                    path.stop().animate({
                        'path': steps.open
                    }, 400, mina.easeinout);
                },
                onCloseDialog: function (instance) {
                    // animate path
                    path.stop().animate({
                        'path': steps.close
                    }, 400, mina.easeinout);
                }
            });
        dlgtrigger.addEventListener('click', dlg.toggle.bind(dlg));
    })();
}
//预约信息修改
function yuEdit(message,_token) {
    //获取值
    var begin1 = $("#EbeginT").val();
    var end1 = $("#EendT").val();
    var id = $(".numSeatE").text();
    //时间段验证
    let Formdata = timesVerify(begin1, end1, id);
    //接收返回值
    var id = Formdata[0],
        begin = Formdata[1],
        end = Formdata[2];
    //ajax
    updateAjax(message,id,begin,end,_token);
    return false;
}














