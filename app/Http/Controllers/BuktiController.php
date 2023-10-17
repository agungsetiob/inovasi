<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Auth;

class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $buktis = Bukti::all();
            $indikators = Indikator::where('status', 'active')->orderBy('jenis')->get();
            return view ('admin.bukti', compact('buktis', 'indikators'));
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
            'indikator'     => 'required',
            'nama'     => 'required|unique:buktis',
            'bobot'   => 'required',

        ]);
        $bukti = new Bukti();
        $bukti->nama = $request->nama;
        $bukti->bobot = $request->bobot;
        $bukti->indikator_id = $request->indikator;
        $bukti->status = 'active';
        $bukti->save();
        //dd($bukti);

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bukti $bukti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bukti $bukti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bukti $bukti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bukti $bukti)
    {
        if (Auth::user()->role == 'admin') {
            $bukti->delete();

            return redirect('master/bukti')->with('success', 'Data Deleted Successfully');
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function disable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $bukti = Bukti::findOrFail($id);
            $bukti->update([
                'status'     => 'active'
            ]);
            return redirect()->back()->with('success', 'Bukti inovasi is disabled successfully');
        }
    }

    public function enable($id, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $bukti = Bukti::findOrFail($id);
            $bukti->update([
                'status'     => 'active'
            ]);
            return redirect()->back()->with('success', 'Bukti inovasi is enabled successfully');
        }
    }
}