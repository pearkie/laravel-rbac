@extends('mainLayout')

@section('title','Manage Users')

@section('page-content')
<div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-black text-light fs-5 text-start">
             User Management
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped-columns table-hover table-primary fs-6">
                 <tr class="text-center">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th colspan="3">Actions</th>
                 </tr>
                 @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('showAssignRoleForm', $user->id) }}" title="Assign Role">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="pt-.5 pb-2 px-1 bg-danger rounded" title="Remove Selected User">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-person-x bg-danger" viewBox="0 0 16 16">
                                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                 <tr>
                    <td colspan="7">
                        {{ $users->links() }}
                    </td>
                 </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('dash') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
