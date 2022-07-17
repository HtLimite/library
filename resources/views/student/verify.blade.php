<link rel="shortcut icon" href="/student/images/Reiki.icon">
<style>
    .main{
        height: 100vh;
        line-height: 100vh;
        text-align: center;
    }
</style>
<div class="main">
    验证成功!{{$email}},<span id="time">3</span>秒后跳转至登录页面
</div>
<script>

    var time = document.getElementById('time').textContent;

    setInterval(redirect,1000);
    function redirect(){
        if(time <= 1){
            window.location.replace("/")
        }else {
            time --;
            document.getElementById('time').innerText = time;
        }
    }
</script>
