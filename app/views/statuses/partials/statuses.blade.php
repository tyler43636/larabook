@if($statuses->count())
    @foreach($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
@else
    <h2>This person has not yet posted a status</h2>
@endif