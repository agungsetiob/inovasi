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
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data'
        ]);
        } else{
            return response()->json([
                'message' => 'Not authorized!'
            ]);
        }
    }

    public function changeStatus($id)
    {
        $skpd = Skpd::find($id);

        if (!$skpd) {
            return response()->json(['success' => false, 'message' => 'skpd tidak ditemukan']);
        }
        $skpd->status = $skpd->status === 'active' ? 'inactive' : 'active';
        $skpd->save();

        return response()->json([
            'success' => true, 
            'newStatus' => $skpd->status,
            'message' => 'Berhasil merubah status'
        ]);
    }
}
