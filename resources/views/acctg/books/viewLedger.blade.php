@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="row">

        <div class="col-4" style="background-color: black; color: white;">Ledger Entry Details</div>
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div>
                Entry Number: {{ $ledger->id }}
            </div>
            <div>
                Entry Details: <br>
                <textarea name="" id="" cols="30" rows="5" class="text-start">
                {{ $ledger->entry }}
                </textarea>
            </div>
            <div>
                Amount: PHP <span class="fw-bold">{{ number_format($ledger->amount,2) }}</span>
            </div>
            <div>
                Encoded by: {{ $encoder->user_firstname.' '.$encoder->user_lastname }}
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('ledgers') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>
@endsection
