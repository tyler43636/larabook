@if (Session::has('flash_notification.message'))
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    </div>
</div>
@endif