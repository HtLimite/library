<div style=" text-align: center;background: radial-gradient(#e6b4b4, transparent);">
    <h2 >欢迎您使用图书馆!</h2>
    <div style="text-align: center">
{{--        @if($status == 1)--}}
{{--            <p><a href="https://lim.htwyy.cn/logVerify?code={{$code}}&email={{$email}}&login=1)">点击登录</a></p>--}}
{{--        @else--}}
{{--            <p><a href="https://lim.htwyy.cn/logVerify?code={{$code}}&email={{$email}}&login=0">点击注册</a></p>--}}
{{--        @endif--}}
        <p>您正在
            @if($status == 1)
                <strong>登录</strong>
            @else
                <strong>注册</strong>
            @endif
            Lim预约系统,用于验证的验证码为<strong>&nbsp;{{$codeN}}&nbsp;</strong>,如非本人,请忽略此信息.</p>
        <p>请于{{$expireTime}}之前验证!</p>
    </div>

</div>
<style>
    a{
        text-decoration: none;
        font-size: 20px;
        color: #0c5460;
    }
</style>
