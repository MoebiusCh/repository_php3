<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class Register extends Component
{
    #[Validate('required|string|max:255')]
    public $name = '';
    #[Validate('required|string|email|max:255|unique:users')]
    public $email = '';
    #[Validate('required|string|min:1|confirmed')]
    public $password = '';
    #[Validate('required|same:password')]
    public $password_confirmation = '';

    public function register()
    {
        $this->validate();

        // dd($this->name);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 1,
        ]);

        Auth::login($user);

        return redirect()->route('home'); // Hoặc trang nào bạn muốn chuyển sau khi đăng ký thành côn
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
