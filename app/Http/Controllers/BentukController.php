<?php

namespace App\Http\Controllers;

use App\Models\Bentuk;
use Illuminate\Http\Request;
use Auth;

class BentukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $bentuks = Bentuk::all();
            return view ('admin.bentuk', compact('bentuks'));
        } else {
            return redirect()->back()->with(['error' => 'Where there is a will there is a way']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bentuk = new Bentuk();
        $bentuk->nama = $request->nama;
        $bentuk->status = 'enabled';
        $bentuk->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bentuk $bentuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bentuk $bentuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bentuk $bentuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bentuk $bentuk)
    {
        if (Auth::user()->role == 'admin') {
            $bentuk->delete();
        
        return redirect('master/bentuk')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function disable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = Bentuk::findOrFail($id);
            $cat->update([
                'status'     => 'disabled'
            ]);
            return redirect()->back()->with('success', 'Bentuk inovasi is disabled successfully');
        }
    }

    public function enable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = Bentuk::findOrFail($id);
            $cat->update([
                'status'     => 'enabled'
            ]);
            return redirect()->back()->with('success', 'Bentuk inovasi is enabled successfully');
        }
    }
}
