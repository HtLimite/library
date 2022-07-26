//座位状态筛选
$("#seatType").click(function () {
    $(".seatType").slideToggle(1000);
});
$("#seatType").hover(function () {
    $(".seatType").slideDown(1000);
});
$(".seatType").hover(function () {

}, function () {
    $(".seatType").slideUp(1000);
})


//ajax筛选结果
var filterArray = [$("#weishiyong"), $("#yuyuezhong"), $("#yiyuyue"), $("#shiyongzhong"), $("#likai")];

for (const [index, elem] of filterArray.entries()) {

    filterArray[index].click(index, function () {

        //设置或返回被选中元素的属性
        let seatStatus = elem.attr('id');

        $.get('/library/2', {'status': seatStatus}, function (data) {
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
                $("#dataSeat").html(data);
            }
        });
    });
}
//flex
$(function (){
    $(window).scroll(function (){
        var offset = $(document).scrollTop();
        if(offset >= 250){
            $(".seatDiv").addClass("seatDiv-fixed");
        }else {
            $(".seatDiv").removeClass("seatDiv-fixed");

        }
    });
});








