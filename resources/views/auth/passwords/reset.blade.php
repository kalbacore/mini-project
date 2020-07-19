@extends('layouts.app')

@section('content')
    <div>
        @livewire('auth.passwords.reset', [
            'token' => $token
        ])
    </div>
@endsection
