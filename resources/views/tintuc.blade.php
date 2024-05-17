@extends('layout')

@section('title', 'Tin tuc')

@section('content')
    <h1 class="text-3xl font-bold">Tin mới nhất</h1>
    @foreach ($tin as $item)
        <h1 class="text-2xl font-bold">{{ $item->tieuDe }}</h1>
        <span>{{ $item->noiDung }}</span> <br>
        <em>Ngày đăng: {{ $item->created_at }}</em>
        <hr />
    @endforeach
@endsection
