<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;


class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    public function login()
    {
        $credentials = $this->validate();
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $user = Auth::user();
            Session::put('user_info', auth()->user());
            if ($user->role === 0) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            session()->flash('error', 'Invalid email or password');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
