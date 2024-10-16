@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>
                                {{ __('Blog') }}
                            </span>
                            <!-- <span>
                                <a href="{{route('blog.index')}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-eye"></i> View All
                                </a>
                            </span> -->
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$blog->title}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$blog->slug}}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="excerpt" class="col-sm-2 col-form-label">Excerpt</label>
                            <div class="col-sm-10">
                                <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror">{{$blog->excerpt}}</textarea>
                                @error('excerpt')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="body" class="col-sm-2 col-form-label">Body</label>
                            <div class="col-sm-10">
                                <textarea name="body" id="txtBody" class="form-control @error('body') is-invalid @enderror">{{$blog->body}}</textarea>
                                @error('body')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>
                                {{ __('Blog Options') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="categories" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('categories') is-invalid @enderror" name="categories[]" id="categories" aria-label="Default select example" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $blog->categories->contains($category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('status') is-invalid @enderror" name="status" aria-label="Default select example">
                                    <option value="">Select Status</option>
                                    <option value="Published" @if($blog->status === 'Published') selected @endif >Published</option>
                                    <option value="Draft" @if($blog->status === 'Draft') selected @endif>Draft</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="published_at" class="col-sm-3 col-form-label">Publish Date</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror" id="" value="{{$blog->published_at}}">
                                @error('published_at')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="images" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-select @error('images') is-invalid @enderror" name="images[]" id="images" multiple>
                                @error('images')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="owl-carousel owl-theme blog-thumbnail">
                                @foreach($blog->images as $image)
                                <div class="blog-thumbnail__box">
                                    <img src="{{asset('/storage/images/'.$image->title)}}" class="blog-thumbnail__box-img img-fluid" alt="Blog Image Thumbnail">
                                    <a href="" class="blog-thumbnail__box-button"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection