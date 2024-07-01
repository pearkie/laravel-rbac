@extends('mainLayout')

@section('title','Assign Role')

@section('page-content')
<div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-black text-light fs-5 text-start">
             Assign Role to User
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('assignRole', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="userName" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="userName" value="{{ $user->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Select Role</label>
                    <select name="role_id" id="role" class="form-select">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Role</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('usertool') }}" class="link-dark">Back to User Management</a>
        </div>
    </div>
</div>
@endsection
