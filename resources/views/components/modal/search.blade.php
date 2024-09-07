<!-- Search Modal-->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchModalLabel">Search {{$modal}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.index')}}" method="GET" id="searchForm">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="search" name="search" aria-describedby="searchHelp" placeholder="{{$modal}}">
                        <div id="searchHelp" class="form-text">Enter User Name or Email Id to search.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>