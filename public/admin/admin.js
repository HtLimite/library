
    //添加
    function addSeat() {
    str = $("#formSeatAdd").serialize();
    $.get('/admin/seat/create', {'str': str}, function (data) {
    if (data === 0) {
    str = "<div class='alert alert-danger'>添加失败</div>";
} else {
    str = "<div class='alert alert-success'>成功添加</div>";
}
    $("#userInfo").html(str);
    $("#seatData").load(location.href + " #seatData");
    setTimeout(function () {
    $(".close").click();
    $("#reset").click();
}, 1000);

})
}

    //全选/反选
    var arr = [];

    function selectAll(){
    arr = $(".checkbox");

    if (arr != null) {
    for (var i = 0; i < arr.length; i++) {
    if (arr[i].checked == false) {
    arr[i].checked = true;
} else {
    arr[i].checked = false;
}
}
}
    return arr;
}
    //批量删除
    function deleteAll(type,_token){
    arr = $(".checkbox");

    var deleArr = [];
    var idArr = [];

    for (var i = 0; i < arr.length; i++) {
        if (arr[i].checked == true) {
        deleArr.push(arr[i]);
        } else {
        }
    }
    if (deleArr.length <= 0) {
    return;
    }

    for (i = 0; i < deleArr.length; i++) {
    idArr.push(deleArr[i].value);
    }
    str = "<div class='alert alert-danger'>即将删除<strong style='color: red'>" + idArr.length + "</strong>个信息</div>";
    $(".deleteMessage").html(str);
    $("#deletB").click();
    $("#deleteTure").click(function () {
        if(type === 'seat'){

            //座位删除

            $.post("/admin/seat/1" + idArr, {'_method': 'delete', '_token': _token}, function (data) {
                if (data == 1) {
                    str ="<div class='alert alert-success'>已删除<strong >" + idArr.length + "</strong>个座位</div>";
                }else {
                    str ="<div class='alert alert-danger'>删除<strong >" + idArr.length + "</strong>个座位失败!</div>";
                }
                $(".deleteMessage").html(str);
                $("#seatData").load(location.href + " #seatData");

                setTimeout(function (){
                    $(".close").click();
                    $(".deleteMessage").html();
                },1000);
            })

        }else if(type === 'student'){

            //学生删除
            $.post("/admin/student/1" + idArr, {'_method': 'delete', '_token': _token}, function (data) {
                if (data == 1) {
                    str ="<div class='alert alert-success'>已删除<strong >" + idArr.length + "</strong>个学生</div>";
                }else {
                    str ="<div class='alert alert-danger'>删除<strong >" + idArr.length + "</strong>个学生失败!</div>";
                }
                $(".deleteMessage").html(str);
                $("#Tanble").load(location.href + " #Tanble");

                setTimeout(function (){
                    $(".close").click();
                    $(".deleteMessage").html();
                },1000);
            })


        }


})

}

    //修改
    function edit (id){

}
    //搜索/分页
    function searchSeat(obj,page){
    search = $("#searInput").val();
    //防止sql
    var regex = /^(.*)(select|insert|into |delete|from |count|drop|join|union|table|database|update|truncate|asc\(|mid\(|char\(|xp_cmdshell|exec |master|net localgroup administrators|\"|:|net user|\| or )(.*)$/gi;
    if(regex.test(search)){
    return false;
}
    $.get("/admin/seat/search",{'searText':search,'page':page},function (data){
    $("#displayData").html(data);
})
    return false;
}



