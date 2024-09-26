<div class="btn-group btn-sm" role="group" aria-label="Basic example">
    <!-- <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal_{{$model->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </button> -->
    <a href="{{route($url.'.edit',$model)}}" class="btn btn-outline-secondary btn-sm">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$model->id}}">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>

<!-- Edit Modal -->
<!-- <div class="modal fade" id="editModal_{{$model->id}}" tabindex="-1" aria-labelledby="editModalLabel_{{$model->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel_{{$model->id}}">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to wdit
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal_{{$model->id}}" tabindex="-1" aria-labelledby="deleteModalLabel_{{$model->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel_{{$model->id}}">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to move <span class="fst-italic">{{$title}}</span> to trash ?
            </div>
            <div class="modal-footer">
                <form action="{{route('user.destroy',$model->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>