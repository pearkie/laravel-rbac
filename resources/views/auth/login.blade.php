@extends('mainLayout')

@section('page-title','Account Login')

@section('auth-content')
<div class="container vh-100">
    <div class="row lh-base">
        <div class="col-4"></div>
        <div class="col-4" style="font-size: 1.6rem; background-color: black; color: white;">User Login</div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-4">&nbsp;</div>
        <div class="col-4" style="border: 1px solid grey;">
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <div class="formgroupp">
                    <label class="auth-labels">Username</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="auth-textbox form-control border border-dark">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="formgroup">
                    <label class="auth-labels">Password</label>
                    <input type="password" name="password" required class="auth-textbox form-control border border-dark">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                   <button type="submit" class="btn btn-md btn-primary">Login</button>
                   <button type="reset" class="btn btn-md btn-danger">Clear</button>
                </div>
                <div class="text-center">
                    Not a user? Register <a href="{{ route('register') }}">Here</a>.
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection
