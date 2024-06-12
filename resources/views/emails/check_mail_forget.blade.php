<div class="w-[600px] m-auto">
    <div class="text-center">
        <h2>Xin chào {{ $user->name }}</h2>
        <p>Email này để giúp bạn lấy lại mật khẩu đã quên</p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
        <p>Chú ý: Mã xác nhận chỉ có hiệu lực 24 giờ</p>
        <p>
            <a href="{{ route('user.getPass', ['user' => $user->id, 'token'=> $user->token]) }}">Đặt lại mật khẩu</a>
        </p>
    </div>
</div>
