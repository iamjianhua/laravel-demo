@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row table-bordered">
            <div class="col-sm">
                name
            </div>
            <div class="col-sm">
                email
            </div>
            <div class="col-sm">
                created
            </div>
        </div>
        @foreach ($users as $user)
            <div class="row table-bordered">
                <div class="col-sm">
                    {{ $user->name }}
                </div>
                <div class="col-sm">
                    {{ $user->email }}
                </div>
                <div class="col-sm">
                    {{ $user->created_at }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
