<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\UserInfo;

class BookController extends Controller
{
    //
    public function showAllLedgers() {

       $response = Gate::inspect('viewAll');

       if($response->allowed()){
          $allBooks = Book::paginate(10);

          return view('acctg.books.viewLedgers')->with(compact('allBooks'));
       } else {
          return redirect()->back();
       }

    }

    public function newLedgerEntry(Request $request) {

        $response = Gate::inspect('create');

        if($response->allowed()){
            return view('acctg.books.newLedger');
        } else {
            return redirect()->back();
        }

    }

    public function viewLedgerDetails($id) {
        $response = Gate::inspect('view');
        // Gate::authorize('view');

        if ($response->allowed()){
            $ledger = Book::find($id);

            $encoderName = UserInfo::where('user_id',$ledger->user_id)->get();

            // dd($encoderName);

            return view('acctg.books.viewLedger')->with(compact('ledger'))->with(['encoder'=> $encoderName[0]]);
        } else {
            // echo $response->message();
            return redirect()->back();
        }
    }
}
