<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $categories = Category::all();
            return view ('admin.category', compact('categories'));
        } else {
            return redirect()->back()->with(['error' => 'Where there is a will there is a way']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->status = 'enabled';
        $category->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $jeni)
    {
        if (Auth::user()->role == 'admin') {
            $jeni->delete();
        
        return redirect('master/jenis')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
        
    }

    public function disableCategory($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = Category::findOrFail($id);
            $cat->update([
                'status'     => 'disabled'
            ]);
            return redirect()->back()->with('success', 'Category is disabled successfully');
        }
    }

    public function enableCategory($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = Category::findOrFail($id);
            $cat->update([
                'status'     => 'enabled'
            ]);
            return redirect()->back()->with('success', 'Category is enabled successfully');
        }
    }
}
