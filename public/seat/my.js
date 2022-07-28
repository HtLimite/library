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
searBut.click(function (){
    $(".searchLi").nextAll().hide();
    $(".searchLi").css("margin-right","233px");
});
$(".close").click(function(){
    $(".searchLi").nextAll().show(700)
    $(".searchLi").css("margin-right","0");
});
//button 绑定事件处理
function searchToggle(obj, evt) {
    var container = $(obj).closest('.search-wrapper');


    if (!container.hasClass('active')) {
        container.addClass('active');
        $("#searchI").css("display","none");
        $("#searchI1").css("display","block");
        evt.preventDefault();

    } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {

        $("#searchI1").css("display","none");

        $("#searchI").css("display","block");

        container.removeClass('active');
        // clear input
        container.find('.search-input').val('');
        // clear and hide result container when we press close
        container.find('.result-container').fadeOut(100, function() {
            $(this).empty();
        });
    }
}
//button submit 属性不生效 input 隐藏域
function subSearch1(){
    $("#subSear").click();
}
//搜索结果传递查询
//函数节流
let lock = true;
function submitFn(obj, evt) {
    //获取结果,去除所有空格
    value = $('.search-input').val().replace(/\s+/g,"");
    //ajax搜索结果
    //防sql注入
    var regex = /^(.*)(select|insert|into |delete|from |count|drop|join|union|table|database|update|truncate|asc\(|mid\(|char\(|xp_cmdshell|exec |master|net localgroup administrators|\"|:|net user|\| or )(.*)$/gi;
    if (value === "" ){
        return;
    }
    if(regex.test(value)) {
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
    if(lock){
        //验证通过,调用请求
        searchAjax(1,true);
        //关锁
        lock = false;
        setTimeout(function (){
            lock = true;
        },3000);
    }


}
//搜索ajax
function searchAjax(page,bool){
    var bool = bool;
    $.get(' library/{1}/edit',{value:value,page:page},function (data){
        if(data == 0){
            spop({
                template: '<h4 style="color: #a5fed7" class="spop-body">搜索失败!</h4>',
                position: 'bottom-right',
                style: 'error',
                autoclose: 2000,
            });
        }else {
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

for (const [index, elem] of filterArray.entries()) {

    filterArray[index].click(index, function () {

        //设置或返回被选中元素的属性
        let seatStatus = elem.attr('id');

        $.get('/library/4', {'status': seatStatus}, function (data) {
            if(data == 0){
                spop({
                    template: '<h4 style="color: #a5fed7" class="spop-body">获取座位信息失败!</h4>',
                    position: 'bottom-right',
                    style: 'error',
                    autoclose: 2000,
                });
            }else {
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
$(function (){
    $(window).scroll(function (){
        var offset = $(document).scrollTop();
        if(offset >= 250){
            $(".seatDiv").addClass("seatDiv-fixed");
        }else {
            $(".seatDiv").removeClass("seatDiv-fixed");
        }
        if (offset >= 700){
            $(".returnTop").show();

        }else {
            $(".returnTop").hide();
        }
    });
});
$(".returnTop").click(function (){
    $('body,html').animate({ scrollTop: 0 }, 800);
    // $(window).scrollTop(0);
});









