@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>
                            {{ __('Blog') }}
                        </span>
                        <span>
                            <a href="{{route('blog.index')}}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-eye"></i> View All
                            </a>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <!-- Add New Modal -->
            <x-modal.add />
        </div>
    </div>
</div>
@endsection