<div class="modal fade" id="globel-delete-confirm-model" tabindex="-1" role="dialog" aria-labelledby="globel-delete-confirm-model-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="globel-delete-confirm-model-title"><i class="fas fa-question-circle"></i> Prompt</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                {!! Form::hidden('hidden_delete_id', '') !!}
                <h3>Are you sure want to delete?</h3>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-delete" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            <button type="button" data-url="" class="btn btn-danger delete-confirm-btn"><i class="fas fa-trash-alt"></i> Delete</button>
        </div>
        </div>
    </div>
</div>