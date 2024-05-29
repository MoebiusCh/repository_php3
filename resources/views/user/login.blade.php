@extends('layout')

@section('title', 'Đăng nhập')
@section('content')
    <div class="min-h-dvh">
        <form class="m-auto mt-10 w-1/3 rounded-lg bg-white px-6 py-8 shadow-xl ring-1 ring-slate-900/5">
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Tài khoản</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Mật khẩu</span>
                </div>
                <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
            </label>
            <button type="button" class="btn-outline-primary btn">Đăng nhập</button>
        </form>
    </div>
@endsection
