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
                            <div class="btn-group btn-sm">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <a href="{{route('blog.create')}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-plus"></i> Add
                                </a>
                                <a href="{{route('blog.trash')}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-trash-can"></i> Trash
                                </a>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="60%">Details</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$blog->title}}
                                    <br>
                                    {{$blog->slug}}<br>
                                    @foreach($blog->categories as $category)
                                    <a href="#" class="badge text-reset text-wrap fs-8 fw-light p-0">{{$category->title}} </a>
                                    @endforeach
                                    <br>
                                    <span class="fs-8">Author: {{$blog->user->name}}</span>
                                </td>
                                <td><x-button.trash-options :model="$blog" :title="$blog->title" url="blog" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Search Modal -->
            <x-modal.search modal="Blog" />
        </div>
    </div>
</div>
@endsection