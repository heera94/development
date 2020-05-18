<!-- Modal -->
<div class="modal fade" id="{{(! empty($modelData['id'])) ? $modelData['id'] : rand()}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{(! empty($modelData['title'])) ? $modelData['title'] : ''}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{$slot}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times text-danger"></i> Close</button>
            <button type="button" {{(! empty($modelData['button']['data'])) ? $modelData['button']['data'] : ''}} id="{{(! empty($modelData['button']['id'])) ? $modelData['button']['id'] : 'Save changes'}}" class="btn btn-primary {{(! empty($modelData['button']['class'])) ? $modelData['button']['class'] : 'Save changes'}}">{!!  (! empty($modelData['button']['name'])) ? $modelData['button']['name'] : 'Save changes' !!}</button>
        </div>
        </div>
    </div>
</div>