<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Lấy lại mật khẩu</h2>

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="ForgetPass">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input wire:model.live="email" type="email" name="email" id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" @if ($errors->has('email')) disabled @endif
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Gửi email xác nhận
                </button>
                <span wire:loading wire:target="ForgetPass" class="text-amber-300">
                    Đang gửi mail cho bạn...
                </span>
            </div>
            <div class="text-green-600">
                @if (session()->has('yes'))
                    {{ session('yes') }}
                @endif
            </div>
        </form>
    </div>
</div>
