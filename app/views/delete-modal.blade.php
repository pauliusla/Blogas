<div class="modal fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        &times;
                    </span></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(['id' => 'delete-form', 'method' => 'delete']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    {{ HTML::script(asset('custom/delete.js')) }}
@stop