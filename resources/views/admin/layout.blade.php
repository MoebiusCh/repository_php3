@extends('layout.general')
@section('page_content')
    @livewire('admin.sideboard')
    @yield('content')
    @include('layout.admin.footer')
@endsection
