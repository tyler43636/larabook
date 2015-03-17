<article class="media status-media">
    <div class="pull-left">
        @include('layouts.partials.avatar', ['size' => 100, 'user' => $status->user])
    </div>
    <div class="media-body status-media-body">
        <h4 class="media-heading status-media-heading">{{ link_to_route('profile', $status->user->username, $status->user->username) }}</h4>
        <p class="media-time status-media-time">{{ $status->present()->timeSincePublished() }}</p>
        {{ $status->body }}
    </div>
</article>