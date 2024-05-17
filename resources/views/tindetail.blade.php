@extends('layout')

@section('title', 'Tin tuc')

@section('content')
    <div class="min-h-dvh">
        <h1 class="text-3xl font-bold">Tin tức {{ $tintuc->tieuDe }}</h1>
        <div class="card card-side border-zinc-950 bg-base-100 shadow-xl">
            <figure>
                <img src="" alt="Movie" />
            </figure>
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    <a href="{{ route('tindetail', ['id' => $tintuc->id]) }}">{{ $tintuc->tieuDe }}</a>
                </h2>
                <p><span>{{ $tintuc->noiDung }}</span></p>
                <div class="card-actions justify-end">
                    <em>Ngày đăng: {{ $tintuc->created_at }}</em>
                    <button class="btn btn-primary">Watch</button>
                </div>
            </div>
        </div>
    </div>
@endsection
