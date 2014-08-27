@extends('layouts.default')
@section('content')
<div class="jumbotron">
    <h1>Welcome to Larabook</h1>
    <p>Welcome to the premiere place to discuss the Laravel PHP framework.</p>
    @if( ! $currentUser )
    <p>Why don't you sign up to see for yourself.</p>
    <p>
        {{ link_to_route('register', 'Sign Up!', null, ['class' => 'btn btn-primary btn-lg']) }}
    </p>
    @endif
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <span class="glyphicon glyphicon-user pull-left"></span>
            <p>Follow other Users!</p>
          </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="well well-lg">
        <span class="glyphicon glyphicon-user pull-left marketing-icon"></span>
        <p>Follow other Users!</p>
    </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
@stop