<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;
use Auth;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $skpds = Skpd::all();
            return view ('admin.skpd', compact('skpds'));
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
        $skpd = new Skpd();
        $skpd->nama = $request->nama;
        $skpd->status = 'active';
        $skpd->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skpd $skpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skpd $skpd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skpd $skpd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skpd $skpd)
    {
        if (Auth::user()->role == 'admin') {
            $skpd->delete();
        
        return redirect('master/skpd')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }
}
