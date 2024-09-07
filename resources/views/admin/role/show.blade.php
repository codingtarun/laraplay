@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-10">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>
                            {{ __('Roles & Permissions') }}
                        </span>
                        <span>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-plus"></i> Add
                            </button>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th scope="col">Role</th>
                                <th scope="col">Permissions</td>
                            </tr>
                            <tr>
                                <td scope="col">{{Str::ucfirst($role->name)}}</th>
                                <td scope="col">
                                    @foreach($permissions as $permission)
                                    <small>
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="SwitchCheck_{{$permission->id}}" @if($role->hasPermissionTo($permission->name)) checked @endif >
                                            <label class="form-check-label" for="SwitchCheck_{{$permission->id}}">{{Str::ucfirst($permission->name)}}</label>
                                        </div>
                                    </small>
                                    @endforeach
                                </td>
                            </tr>
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