@extends('layout')

@section('title', 'Tin tuc')

@section('content')
    <h1 class="text-3xl font-bold">Tin trong loại {{ $tintuc_category->name }}</h1>
    @foreach ($tintuc as $item)
        <div class="card card-side border-zinc-950 bg-base-100 shadow-xl">
            <figure>
                <img src="" alt="Movie" />
            </figure>
            <div class="card-body">
                <h2 class="card-title text-2xl font-bold">
                    <a href="{{ route('tindetail', ['id' => $item->id]) }}">{{ $item->tieuDe }}</a>
                </h2>
                <p><span>{{ $item->noiDung }}</span></p>
                <div class="card-actions justify-end">
                    <em>Ngày đăng: {{ $item->created_at }}</em>
                    <button class="btn btn-primary">Watch</button>
                </div>
            </div>
        </div>
    @endforeach
@endsection
