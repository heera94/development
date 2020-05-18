@component('admin.shared._components._modal-popup')
    @slot('modelData', [
        'id' => 'image-crop-modal-popup',
        'title' => 'Crop image',
        'button' => [
            'name' => '<i class="fas fa-upload"></i> Upload',
            'class' => 'upload-crop-image',
            'data' => 'data-url=' . url('/upload-user-profile-photo') 
        ],
        ''
    ])
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <input type="file" class="hidden" id="crop-img-resource" class="crop-img-resource" >
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="upload-demo" style="padding: 0 !important;"></div>
                        <button type="button" id="image-crop" class="btn btn-sm btn-secondary mt-3"><i class="fas fa-crop"></i> Crop image</button>
                        <input type="hidden" class="view-crop-image-block" value="">
                        <div class="mt-2">
                            <div id="error-crop"></div>
                        </div>
                    </div>
    
    
                    <div class="col-md-4" style="">
                    </div>
                </div>
    
            </div>
        </div>
    </div>
@endcomponent

@push('module-script')
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="{{asset('plugins/image-crop.js')}}"></script>
@endpush