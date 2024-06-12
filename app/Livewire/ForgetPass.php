<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;

class ForgetPass extends Component
{
    #[Validate('required', message: 'Vui lòng nhập email')]
    #[Validate('exists:users', message: 'Email không tồn tại')]
    public $email;
    public function render()
    {
        return view('livewire.forget-pass');
    }

    public function ForgetPass()
    {
        $user = User::where('email', $this->email)->first();
        $token = strtoupper(Str::random(10));
        $user->update(['token'=>$token]);
        Mail::send('emails.check_mail_forget', compact('user'), function ($email) use ($user) {
            $email->subject('PTT Shop - Lấy lại mật khẩu');
            $email->to($user->email, $user->name);
        });
        $this->reset(['email']);
        return redirect()->back()->with('yes', 'Vui lòng check mail để thực hiện thay đổi mật khẩu');
    }
}
