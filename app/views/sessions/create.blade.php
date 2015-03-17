@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Sign in to Larabook</h1>
        @include('layouts.partials.errors')
        {{ Form::open(['route' => 'login']) }}
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary btn-lg']) }}
                {{ link_to_action('RemindersController@getRemind', 'Forgot Password?', null, ['class' => 'btn btn-default btn-lg']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop
