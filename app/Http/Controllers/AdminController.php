<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Category;
use App\Models\Book;


use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth::user()->usertype;
            if ($user_type == 'admin') {
                return view('admin.index');
            } elseif ($user_type == 'user') {

                $data = Book::all();

                return view('home.index' , compact('data'));
            }
        } else {

            redirect()->back();
        }
    }

    public function category_page()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {

        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();

        return redirect()->back()->with('massage', 'category added Successfully');
    }

    public function cat_delete($id)
    {
        $data = Category::find($id);

        $data->delete();
        return redirect()->back()->with('massage', 'category deleted Successfully');
    }

    public function edit_category($id)
    {


        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }



    public function update_categpry(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();

        return redirect('/category_page')->with('massage', 'category updated Successfully');
        // return redirect()->route('category_page')

    }

    public function add_book()
    {
        $data = Category::all();
        return view('admin.add_book', compact('data'));
    }

    public function store_book(Request $request)
    {
        $data = new Book;
        $data->title = $request->book_name;
        $data->auther_name = $request->auther_name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category;



        $book_image = $request->book_img;
        $auther_image = $request->auther_img;

        if ($book_image) {

            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book',  $book_image_name);
            $data->book_img  = $book_image_name;
        }
        if ($auther_image) {

            $auther_image_name = time() . '.' . $auther_image->getClientOriginalExtension();

            $request->auther_img->move('auther',  $auther_image_name);
            $data->auther_img  = $book_image_name;
        }



        $data->save();
        return redirect()->back();
    }

    public function show_book()
    {
        $book = Book::all();
        return view('admin.show_book', compact('book'));
    }

    public function book_delete($id)
    {


        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('massage', 'book deleted successfully');
    }

    public function edit_book($id)
    {
        $data = Book::find($id);

        $category = Category::all();
        return view('admin.edit_book', compact('data', 'category'));
    }


    public function update_book(Request $request, $id)
    {
        $data = Book::find($id);
        $data->title = $request->title;
        $data->auther_name = $request->auther_name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category;

        $book_image = $request->book_img;
        $auther_image = $request->auther_img;

        if ($book_image) {

            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->book_img->move('book',  $book_image_name);
            $data->book_img  = $book_image_name;
        }
        if ($auther_image) {

            $auther_image_name = time() . '.' . $auther_image->getClientOriginalExtension();

            $request->auther_img->move('auther',  $auther_image_name);
            $data->auther_img  = $book_image_name;
        }



        $data->save();
        return redirect('/show_book')->with('massage', 'book updated successfully');
    }
}
