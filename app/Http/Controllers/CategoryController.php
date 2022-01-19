<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Handle\CategoryHandler\DeleteCategory;
use App\Http\Handle\CategoryHandler\SaveCategory;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::paginate(5);
        return view('category.list', $data);
    }

    public function create()
    {
        $data['category'] = null;
        return view('category.create_update', $data);
    }

    public function store(CategoryRequest $categoryRequest)
    {
        if ((new SaveCategory($categoryRequest))->save()) {
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('category/list');
        }
        Session::flash('alert-danger', 'Data Store Failed!!');
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $category_id = $request->id;
        $data['category'] = Category::find($category_id);
        return view('category.create_update', $data);
    }

    public function delete(Request $request)
    {
        if ((new DeleteCategory($request))->delete()) {
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('category/list');
        }
        Session::flash('alert-danger', 'Data Delete Failed!!');
        return redirect()->back();
    }
}
