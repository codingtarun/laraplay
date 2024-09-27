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
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Details</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashedCategories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{Str::ucfirst($category->title)}}
                                </td>
                                <td><x-button.trash-options :model="$category" :title="$category->title" url="category" /></td>
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