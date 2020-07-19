@extends('layouts.app')

@section('content')
    <div>
        @can ('create messages')
            <livewire:create-message :user="$user" />
        @endcan
    </div>
@endsection
