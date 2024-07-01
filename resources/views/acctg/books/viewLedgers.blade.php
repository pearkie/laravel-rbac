@extends('mainLayout')

@section('page-content')
<div class="container-fluid">
    <!-- Be present above all else. - Naval Ravikant -->
    <table class="table table-striped-columns table-dark table-hover">
       <tr>
          <th>#</th>
          <th>Entry</th>
          <th>Entry Amount</th>
          <th>Encoded By</th>
          <th></th>
       </tr>
       @foreach($allBooks as $book)
       <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->entry }}</td>
          <td class="text-end">{{ number_format($book->amount,2) }}</td>
          <td>{{ $book->user_id }}</td>
          <td>
            <a href="{{ route('ledger',$book->id) }}" class="link-warning">View Details</a>
          </td>
       </tr>
       @endforeach
       <tr>
          <td colspan="5">
              {{ $allBooks->links() }}
          </td>
       </tr>
    </table>

    <a href="{{ route('acctg') }}" class="link-dark">Back</a>
</div>
@endsection
