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
                            <a href="{{route('blog.create')}}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-plus"></i> Add
                            </a>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->user->name}}</td>
                                <td>Options</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Add New Modal -->
            <x-modal.add />
        </div>
    </div>
</div>
@endsection