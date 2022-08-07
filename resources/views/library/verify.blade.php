<link rel="shortcut icon" href="/student/images/Reiki.icon">
<style>
    .main{
        height: 100vh;
        line-height: 100vh;
        text-align: center;
        font-size: 27px;
    }
</style>
<div class="main">

        注册成功!&nbsp;&nbsp;&nbsp;{{$email}}&nbsp;&nbsp;&nbsp;<span id="time">3</span>秒后跳转至登录页面
</div>
<script>

    var time = document.getElementById('time').textContent;

    setInterval(redirect,1000);
    function redirect(){
        if(time <= 1){
            window.location.replace("/library")
        }else {
            time --;
            document.getElementById('time').innerText = time;
        }
    }
</script>

