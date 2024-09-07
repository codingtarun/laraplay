@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>
                            {{ __('Users') }}
                        </span>
                        <span>
                            <div class="btn-group btn-sm">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fa-solid fa-plus"></i> Add
                                </button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{route('user.show',$user->id)}}">{{$user->name}}</a><br>
                                    @foreach($user->getRoleNames() as $role)
                                    <small>{{$role}}</small>
                                    @endforeach
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <x-button.options :model="$user" :title="$user->name" url="user" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
            <!-- Add New Modal -->
            <x-modal.add />
            <!-- Search Modal-->
            <x-modal.search modal="User" />
        </div>
    </div>
</div>
@endsection