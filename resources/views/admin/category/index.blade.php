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
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <a href="{{route('category.create')}}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-plus"></i> Add
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
                                <th scope="col">Details</th>
                                <th scope="col">Status</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{route('category.show',$category)}}">{{Str::ucfirst($category->title)}}</a><br>
                                    <p class="small">This category has <a href="#">{{$category->blogs->count()}} posts</a>
                                </td>
                                <td>
                                    <x-button.status-switch :model="$category" />
                                </td>
                                <td><x-button.options :model="$category" :title="$category->title" url="category" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Search Modal -->
            <x-modal.search modal="Category" />
        </div>
    </div>
</div>
@endsection