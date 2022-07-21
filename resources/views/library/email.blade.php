<div style=" text-align: center;background: radial-gradient(#e6b4b4, transparent);">
    <h2 >欢迎您使用图书馆!</h2>
    <div style="text-align: center">
        @if($status == 1)
            <p><a href="http://127.0.0.1:8000/logVerify?code={{$code}}">点击登录</a></p>
        @else
            <p><a href="http://127.0.0.1:8000/logVerify?code={{$code}}">点击注册</a></p>
        @endif
        <p>请于{{$expireTime}}之前点击验证!</p>
    </div>

</div>
<style>
    a{
        text-decoration: none;
        font-size: 20px;
        color: #0c5460;
    }
</style>
