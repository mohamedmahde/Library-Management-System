<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

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
                return view('home.index');
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
}
