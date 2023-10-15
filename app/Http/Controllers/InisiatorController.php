<?php

namespace App\Http\Controllers;

use App\Models\Inisiator;
use Illuminate\Http\Request;
use Auth;

class InisiatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $inisiators = Inisiator::all();
            return view ('admin.inisiator', compact('inisiators'));
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
        $this->validate($request, [
            'nama'     => 'required|unique:inisiators',

        ]);
        $inisiator = new Inisiator();
        $inisiator->nama = $request->nama;
        $inisiator->status = 'active';
        $inisiator->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inisiator $inisiator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inisiator $inisiator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inisiator $inisiator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inisiator $inisiator)
    {
        if (Auth::user()->role == 'admin') {
            $inisiator->delete();
        
        return redirect('master/inisiator')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function disable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = inisiator::findOrFail($id);
            $cat->update([
                'status'     => 'inactive'
            ]);
            return redirect()->back()->with('success', 'inisiator inovasi is disabled successfully');
        }
    }

    public function enable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = inisiator::findOrFail($id);
            $cat->update([
                'status'     => 'active'
            ]);
            return redirect()->back()->with('success', 'inisiator inovasi is enabled successfully');
        }
    }
}
