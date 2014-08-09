@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <h2>This person has not yet posted a status</h2>
@endforelse