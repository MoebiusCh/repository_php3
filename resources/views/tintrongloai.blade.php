@extends('layout')

@section('title', 'Tin tuc')

@section('content')
    <h1 class="text-3xl font-bold">Tin trong loại {{ $tintuc_category->name }}</h1>
    @foreach ($tintuc as $item)
        <h1 class="text-2xl font-bold">
            <a href="">{{ $item->tieuDe }}</a>
            </h1>
        <span>{{ $item->noiDung }}</span>
        <br />
        <em>Ngày đăng: {{ $item->created_at }}</em>
    @endforeach

    <hr />
@endsection
