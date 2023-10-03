<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Skpd;
use App\Models\Bentuk;
use App\Models\Urusan;
use App\Models\File;
use App\Models\Indikator;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $proposals = Proposal::all();
            $totalBobot = File::with('bukti')
            ->get()
            ->pluck('bukti.bobot')
            ->sum();
            return view ('inovasi.index', compact( 'proposals', 'totalBobot'));
        } elseif (Auth::user()->role == 'user') {
            $proposals = Proposal::where('user_id', Auth::user()->id)->get();
            return view ('inovasi.index', compact( 'proposals'));
        }else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'enabled')->get();
        $skpds = Skpd::where('status', 'active')->get();
        $bentuks = Bentuk::where('status', 'enabled')->get();
        $urusans = Urusan::where('status', 'active')->get();
        return view('inovasi.create', compact(
            'categories', 
            'skpds', 
            'bentuks', 
            'urusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'logo'     => 'image|mimes:jpeg,png,jpg|max:1024',
            'nama'     => 'required',
            'tahapan_inovasi'   => 'required',
            'inisiator'      => 'required',
            'rancang_bangun' => 'required',
            'tujuan'    => 'required',
            'manfaat' => 'required',
            'hasil' => 'required',
            'ujicoba' => 'required',
            'implementasi' => 'required',
            'anggaran' => 'required',
            'bentuk' => 'required',
            'category' => 'required',
            'urusans' => 'required',

        ]);

        //upload image
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $image->storeAs('public/inovasi', $image->hashName());
            //create props
            $proposal = Proposal::create([
                'logo'     => $image->hashName(),
                'nama'     => $request->nama,
                'tahapan_inovasi'   => $request->tahapan_inovasi,
                'inisiator'      => $request->inisiator,
                'rancang_bangun' => $request->rancang_bangun,
                'tujuan'    => $request->tujuan,
                'manfaat' => $request->manfaat,
                'hasil' => $request->hasil,
                'ujicoba' => $request->ujicoba,
                'implementasi' => $request->implementasi,
                'anggaran' => $request->anggaran,
                'bentuk_id' => $request->bentuk,
                'category_id' => $request->category,
                'skpd_id' => $request->skpd,
                'user_id' => auth()->user()->id,
            ]);
            $proposal->urusans()->sync($request->urusans);
        } else {
                //create props
            $proposal = Proposal::create([
                'nama'     => $request->nama,
                'tahapan_inovasi'   => $request->tahapan_inovasi,
                'inisiator'      => $request->inisiator,
                'rancang_bangun' => $request->rancang_bangun,
                'tujuan'    => $request->tujuan,
                'manfaat' => $request->manfaat,
                'hasil' => $request->hasil,
                'ujicoba' => $request->ujicoba,
                'implementasi' => $request->implementasi,
                'anggaran' => $request->anggaran,
                'bentuk_id' => $request->bentuk,
                'category_id' => $request->category,
                //urusans()->attach($request->urusans),
                //'urusan_id' => $request->urusan,
                'skpd_id' => $request->skpd,
                'user_id' => auth()->user()->id,
            ]);
            $proposal->urusans()->sync($request->urusans);
        }
        //redirect to index
        return redirect()->intended('proyek/inovasi')->with(['success' => 'Berhasil simpan inovasi']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposal $inovasi)
    {
        $categories = Category::where('status', 'enabled')->get();
        $skpds = Skpd::where('status', 'active')->get();
        $bentuks = Bentuk::where('status', 'enabled')->get();
        $urusans = Urusan::where('status', 'active')->get();
        if (auth()->user()->id == $inovasi->user_id) {
            return view('inovasi.edit', compact(
                'inovasi',
                'categories', 
                'skpds', 
                'bentuks', 
                'urusans',));
        } else{
            return redirect()->back()->with('error', 'kebaikan akan menghasilkan kebaikan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        //
    }

    public function proposalReport($id)
    {
        $proposal = Proposal::findOrFail($id);
        $files = Indikator::all();
        //$files = File::where('proposal_id', $id)->orderBy('indikator_id')->get();
        $pdf = PDF::loadview('inovasi.proposal-report',compact('proposal', 'files'))->setPaper('A4', 'portrait');
        set_time_limit(300);
        return $pdf->stream('proposal-'.$id.'.pdf');
    }
}
