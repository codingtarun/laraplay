@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>
                            {{ __('Category Edit') }}
                        </span>
                        <span>
                            <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-eye"></i> View All
                            </a>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$category->title ?? old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('status') is-invalid @enderror" name="status" aria-label="Default select example">
                                    <option value="">Select Status</option>
                                    <option value="Published" @if($category->status === 'Published') selected @endif>Published</option>
                                    <option value="Draft" @if($category->status === 'Draft') selected @endif>Draft</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Add New Modal -->
            <x-modal.add />
        </div>
    </div>
</div>
@endsection