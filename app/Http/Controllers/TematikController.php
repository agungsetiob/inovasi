<?php

namespace App\Http\Controllers;

use App\Models\Tematik;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class TematikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $tematiks = Tematik::all();
            return view('admin.tematik', compact('tematiks'));
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
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|unique:tematiks',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tematik = Tematik::create([
            'nama'     => $request->nama,
            'status'   => 'active',
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $tematik
        ]);
    }

    /**
     * change status of klasifikasi
     */
    public function toggleStatus(Tematik $tematik)
    {
        $currentStatus = request('currentStatus');

    // Toggle the status
        $newStatus = ($currentStatus === 'active') ? 'inactive' : 'active';
        $tematik->update(['status' => $newStatus]);

        return response()->json(['newStatus' => $newStatus, 'message' => 'Berhasil merubah status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tematik $tematik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tematik $tematik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tematik $tematik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tematik $tematik)
    {
        if (Auth::user()->role == 'admin') {
            $tematik->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus data',
            ]); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized to delete data'
            ], 403);
        }
    }
}
