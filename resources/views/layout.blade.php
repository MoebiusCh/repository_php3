@extends('layout.general')
@section('page_content')
    @livewire('client.header')
    @yield('content')
    @include('footer')
@endsection
