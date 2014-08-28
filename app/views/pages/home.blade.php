@extends('layouts.default')
@section('content')
<div class="jumbotron larabook-jumbotron">
    <h1>Welcome to Larabook</h1>
    <p>The premiere place to discuss the Laravel PHP framework.</p>
    @if( ! $currentUser )
    <p>Why don't you sign up to see for yourself.</p>
    <p>
        {{ link_to_route('register', 'Sign Up!', null, ['class' => 'btn btn-default btn-lg']) }}
        {{ link_to_route('login', 'Login!', null, ['class' => 'btn btn-primary btn-lg']) }}
    </p>
    @endif
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-md-4">
        <div class="well well-lg marketing-well">
            <span class="glyphicon glyphicon-plus marketing-icon"></span>
            <p>Follow your friends</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-lg marketing-well">
            <span class="glyphicon glyphicon-user marketing-icon"></span>
            <p>Share your thoughts</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-lg marketing-well">
            <span class="glyphicon glyphicon-thumbs-up marketing-icon"></span>
            <p>Like what your friends post</p>
        </div>
    </div>
</div>
@stop
