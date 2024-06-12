@extends('layout.general')
@section('page_content')
    @livewire('client.header')
    <div class="min-h-dvh">
        {{ $slot }}
    </div>
    @include('footer')
@endsection
