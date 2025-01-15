<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('home.index', compact('data'));
    }


    // public function book_detalils($id){

    //     $data = Book::find($id);

    //     return view('home.book_detalils' , compact('data'));

    // }

    public function borrow_book($id)
    {

        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;
        if ($quantity >= '1') {
            if (Auth::id()) {

                $user_id = Auth::user()->id;

                $borrow = new Borrow;
                $borrow->book_id  = $book_id;
                $borrow->user_id  = $user_id;

                // $borrow->status = 'Applied';

                $borrow->save();
                return redirect()->back()->with('massage', 'A request send to the admin to borrow this book ');
            } else {

                return redirect('/login');
            }
        } else {
            return redirect()->back()->with('massage', 'Not enough Book');
        }
    }


    public function book_history()
    {
        if (Auth::id()) {

            $user_id = Auth::user()->id;
            $data = Borrow::where('user_id' , '=' , $user_id)->get();
            return view('home.book_history' , compact('data'));

        }
    }
}
