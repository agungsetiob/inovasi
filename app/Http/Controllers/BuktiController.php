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
        if (Auth::user()->role === 'admin') {
            $indikators = Indikator::where('status', 'active')->orderBy('jenis')->get();
            return view ('admin.bukti', compact('indikators'));
        } else {
            return redirect()->back()->with(['error' => 'Where there is a will there is a way']);
        }
    }

    /*
    * load bukti data in json format
    */
    public function loadBuktis()
    {
        if (Auth::user()->role === 'admin') {
            $buktis = Bukti::with('indikator')->get();
            return response()->json([
                'success' => true,
                'data' => $buktis
            ]);
        }
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
        $indikator = $bukti->indikator;
        return response()->json([
            'success' => true,
            'message' => 'Berhasil simpan jenis bukti',
            'data' => $bukti,
            'indikator' => $indikator
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bukti $bukti)
    {
        if (Auth::user()->role == 'admin') {
            $bukti->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus data'
            ]);
        } else{
            return redirect()->back()->with('error', 'Many ways to rome');
        }
    }

    public function changeStatus($id)
    {
        $bukti = Bukti::find($id);

        if (!$bukti) {
            return response()->json(['success' => false, 'message' => 'Bukti tidak ditemukan']);
        }
        $bukti->status = $bukti->status === 'active' ? 'inactive' : 'active';
        $bukti->save();

        return response()->json([
            'success' => true, 
            'newStatus' => $bukti->status,
            'message' => 'Berhasil merubah status'
        ]);
    }
}
