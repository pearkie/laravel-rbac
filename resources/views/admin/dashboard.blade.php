@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius
    <p>
        <a href="{{ route('usertool') }}" class="link-primary">Manage User Roles and Permissions</a>
    </p>
    <p>
        <a href="{{ route('home') }}" class="link-dark">Back</a>
    </p>
</div>
@endsection

