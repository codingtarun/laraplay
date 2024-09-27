<div class="btn-group btn-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#restoreModal_{{$model->id}}">
        <i class="fa-solid fa-arrow-rotate-left"></i>
    </button>
    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#permanentDeleteModal_{{$model->id}}">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="restoreModal_{{$model->id}}" tabindex="-1" aria-labelledby="restoreModelLabel_{{$model->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restoreModalLabel_{{$model->id}}">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure restore <span class="fst-italic">{{$title}}</span> ?
            </div>
            <div class="modal-footer">
                <form action="{{route($url.'.restore',$model)}}" method="post">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="permanentDeleteModal_{{$model->id}}" tabindex="-1" aria-labelledby="permanentDeleteModalLabel_{{$model->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permanentDeleteModalLabel_{{$model->id}}">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to permanently delete <span class="fst-italic">{{$title}}</span> ?
            </div>
            <div class="modal-footer">
                <form action="{{route($url.'.forceDelete',$model)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>