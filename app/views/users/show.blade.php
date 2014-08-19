@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="media">
            <div class="pull-left">
                @include('layouts.partials.avatar', ['size' => 50])
            </div>
            <div class="media-body">
                <h1 class="media-heading">{{ $user->username }}</h1>
                <p>{{ $user->statuses()->count() }}</p>
            </div>
            @unless($user->is($currentUser))
                @include('users.forms.follow-form')
            @endif
        </div>
    </div>

    <div class="col-md-6">

        @if($user->is($currentUser))
            @include('statuses.partials.publish-status-form')
        @endif

        @include('statuses.partials.statuses', ['statuses' => $user->statuses])

    </div>
</div>
@stop