@extends('layout.general')
@section('page_content')
    @livewire('admin.sideboard')
    <div class="min-h-dvh">
        {{ $slot }}
    </div>
    @include('layout.admin.footer')
@endsection
