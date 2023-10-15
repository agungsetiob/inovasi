<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use Illuminate\Http\Request;
use Auth;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $tahapans = Tahapan::all();
            return view ('admin.tahapan', compact('tahapans'));
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
            'nama'     => 'required|unique:tahapans',

        ]);

        $tahapan = new Tahapan();
        $tahapan->nama = $request->nama;
        $tahapan->status = 'active';
        $tahapan->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(tahapan $tahapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tahapan $tahapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tahapan $tahapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tahapan $tahapan)
    {
        if (Auth::user()->role == 'admin') {
            $tahapan->delete();
        
        return redirect('master/tahapan')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function disable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = tahapan::findOrFail($id);
            $cat->update([
                'status'     => 'inactive'
            ]);
            return redirect()->back()->with('success', 'tahapan inovasi is disabled successfully');
        }
    }

    public function enable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $cat = tahapan::findOrFail($id);
            $cat->update([
                'status'     => 'active'
            ]);
            return redirect()->back()->with('success', 'tahapan inovasi is enabled successfully');
        }
    }
}
