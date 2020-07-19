@extends('layouts.base')

@section('body')
    <x-layout.topbar />
    <div class="flex flex-col justify-center min-h-screen w-screen">
        @yield('content')
    </div>
@endsection
