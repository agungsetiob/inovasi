<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;
use Auth;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $indikators = Indikator::all();
            return view ('admin.indikator', compact('indikators'));
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
        $indikator = new Indikator();
        $indikator->nama = $request->nama;
        $indikator->status = 'enabled';
        $indikator->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        if (Auth::user()->role == 'admin') {
            $indikator->delete();
        
        return redirect('master/indikator')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function disable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $indikator = Indikator::findOrFail($id);
            $indikator->update([
                'status'     => 'disabled'
            ]);
            return redirect()->back()->with('success', 'Indikator inovasi is disabled successfully');
        }
    }

    public function enable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $indikator = Indikator::findOrFail($id);
            $indikator->update([
                'status'     => 'enabled'
            ]);
            return redirect()->back()->with('success', 'Indikator inovasi is enabled successfully');
        }
    }
}
