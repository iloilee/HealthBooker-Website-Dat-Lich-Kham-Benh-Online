<form method="POST" action="{{ route('password.update') }}" class="space-y-4">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        <label>Email</label>
        <input type="email" name="email" class="w-full border px-3 py-2" required>
    </div>

    <div>
        <label>Mật khẩu mới</label>
        <input type="password" name="password" class="w-full border px-3 py-2" required minlength="6">
    </div>

    <div>
        <label>Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation" class="w-full border px-3 py-2" required minlength="6">
    </div>

    <button class="w-full bg-primary text-white py-2 rounded">Đặt lại mật khẩu</button>
</form>
