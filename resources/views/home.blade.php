@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>
                <div class="card-body">
                @foreach($users as $user)
                <p>
                    Name: {{$user->name}} <br>
                    Email: {{$user->email}}
                </p>
                @endforeach
                    <a href="{{ url('upload') }}">Gallery</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


