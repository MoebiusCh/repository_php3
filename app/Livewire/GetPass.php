<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class GetPass extends Component
{
    public $token;
    public $user;
    #[Validate('required', message: 'Vui lòng nhập mật khẩu mới')]
    public $password;
    #[Validate('required', message: 'Vui lòng nhập mật khẩu xác nhận')]
    #[Validate('same:password', message: 'Mật khẩu xác nhận không trùng khớp với mật khẩu mới')]
    public $password_confirmation;

    public function mount(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;

        if ($this->user->token !== $this->token) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.get-pass');
    }

    public function postGetPass()
    {
        $user = $this->user;
        
        $this->validate();
        $hashedPassword = Hash::make($this->password);
        $user->update(['password' => $hashedPassword]);

        return redirect()->route('login')->with('success', 'Đặt lại mật khẩu thành công, hãy thử đăng nhập');
    }
}
