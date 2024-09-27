@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>
                            {{ __('Category') }}
                        </span>
                        <span>
                            <div class="btn-group btn-sm">
                                <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-list"></i> View All
                                </a>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <th scope="col">Title</th>
                            <td>{{$category->title}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>{{$category->status}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Blogs</th>
                            <td>
                                <div class="list-group">
                                    @if($category->blogs->count() !=null)
                                    @foreach($category->blogs as $blog)
                                    <a href="{{route('blog.show',$blog)}}" class="list-group-item list-group-item-action">{{$blog->title}}</a>
                                    @endforeach
                                    @else
                                    <a href="#" class="list-group-item list-group-item-action">No blogs</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Search Modal -->
            <x-modal.search modal="Category" />
        </div>
    </div>
</div>
@endsection