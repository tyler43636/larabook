@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Register for Larabook</h1>
        @include('layouts.partials.errors')
        {{ Form::open(['route' => 'register']) }}
        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirm Password:') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop