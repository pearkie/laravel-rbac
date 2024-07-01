<form action="{{ route('logout') }}" class="d-inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger" style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        Logout
    </button>
</form>
