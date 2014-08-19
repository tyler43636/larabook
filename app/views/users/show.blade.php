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
                <ul class="list-inline text-muted">
                    <li>{{ $user->present()->statusCount() }}</li>
                    <li>{{ $user->present()->followerCount() }}</li>
                </ul>
                @foreach($user->followers as $follower)
                    @include('layouts.partials.avatar', ['size' => 50, 'user' => $follower])
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6">
        @unless($user->is($currentUser))
            @include('users.forms.follow-form')
        @endif

        @if($user->is($currentUser))
            @include('statuses.partials.publish-status-form')
        @endif

        @include('statuses.partials.statuses', ['statuses' => $user->statuses])

    </div>
</div>
@stop