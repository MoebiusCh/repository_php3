@extends('layout.general')
@section('page_content')
    @livewire('admin.sideboard')
    {{ $slot }}
    @include('layout.admin.footer')
@endsection
