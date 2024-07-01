@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <form action="{{ route('saveledger') }}" method="post">
        @csrf
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 border border-dark-subtle py-3">
            <div>
                <label for="entrydetail" class="form-label">Entry Detail:</label>
                <textarea name="entrydetail" id="entrydetail" cols="30" rows="5" class="form-control form-control-sm" style="resize:none;"></textarea>
            </div>
            <div>
                <label for="entryamount" class="form-label">Amount:</label>
                <input type="text" class="form-control form-control-sm text-end" id="entryamount">
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center border-start border-bottom border-end border-dark-subtle py-3">
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <button type="reset" class="btn btn-md btn-danger">Clear</button>
        </div>
        <div class="col-4"></div>
    </div>
    </form>
    <div class="row">
        <div class="col">
            <a href="{{ route('acctg') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
