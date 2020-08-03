@if (session('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-dismissible alert-{{ session('alert-type') }}" id="session-alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif
