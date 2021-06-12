@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p>{{ $role->name }}</p>
            <p>{{ $role->username }}</p>
            <p>{{ $role->email }}</p>

        </div>
    </div>
@endsection
