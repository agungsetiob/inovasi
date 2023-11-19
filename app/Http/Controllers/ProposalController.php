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
use App\Models\Tematik;
use App\Models\Klasifikasi;
use App\Models\Tahapan;
use App\Models\Inisiator;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Log;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::where('user_id', Auth::user()->id)->get();
        return view('inovasi.index', compact( 'proposals'));
    }

    /**
    * Display proposal with status 'sent'
    *
    */
    public function database()
    {
        if (Auth::user()->role == 'admin') {
            $proposals = Proposal::where('status', 'sent')->get();
            return view ('inovasi.database', compact( 'proposals'));
        } else {
            return redirect()->back()->with(['error' => 'wong kongene kok dibandingke']);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $skpds = Skpd::where('status', 'active')->get();
        $bentuks = Bentuk::where('status', 'active')->get();
        $urusans = Urusan::where('status', 'active')->get();
        $klasifikasis = Klasifikasi::where('status', 'active')->get();
        $indikators = Indikator::where('status', 'active')->where('jenis', 'sid')->get()->pluck('id');
        $tematiks = Tematik::where('status', 'active')->orderBy('id')->get();
        $tahapans = Tahapan::where('status', 'active')->get();
        $inisiators = Inisiator::where('status', 'active')->get();
        $options = [];
        foreach ($klasifikasis as $klasifikasi) {
            $options[$klasifikasi->id] = [
                'label' => $klasifikasi->nama,
                'children' => [],
            ];
            foreach ($urusans as $urusan) {
                if ($urusan->klasifikasi_id === $klasifikasi->id) {
                    $options[$klasifikasi->id]['children'][$urusan->id] = $urusan->nama;
                }
            }
        }
        return view('inovasi.create', compact(
            'categories', 
            'skpds', 
            'bentuks', 
            'urusans',
            'tematiks',
            'klasifikasis',
            'options',
            'indikators',
            'tahapans',
            'inisiators'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'profil'     => 'mimes:pdf|max:1536',
            'nama'     => 'required',
            'tahapan'   => 'required',
            'inisiator'      => 'required',
            'rancang_bangun' => 'required',
            'tujuan'    => 'required',
            'manfaat' => 'required',
            'hasil' => 'required',
            'ujicoba' => 'required',
            'implementasi' => 'required',
            'anggaran' => 'mimes:pdf|max:1024',
            'bentuk' => 'required',
            'category' => 'required',
            'urusans' => 'required',
            'tematik' => 'required'

        ]);

        $data = [
            'nama' => $request->nama,
            'tahapan_id'   => $request->tahapan,
            'inisiator_id'      => $request->inisiator,
            'rancang_bangun' => addslashes($request->rancang_bangun),
            'tujuan'    => $request->tujuan,
            'manfaat' => $request->manfaat,
            'hasil' => $request->hasil,
            'ujicoba' => $request->ujicoba,
            'implementasi' => $request->implementasi,
            'bentuk_id' => $request->bentuk,
            'category_id' => $request->category,
            'skpd_id' => $request->skpd,
            'tematik_id' => $request->tematik,
            'user_id' => auth()->user()->id,
            'status' => 'draft'
        ];
        if ($request->hasFile('profil')) {
            $profil = $request->file('profil');
            $profil->storeAs('public/profil', $profil->hashName());
            $data['profil'] = $profil->hashName();
        }
        if ($request->hasFile('anggaran')) {
            $anggaran = $request->file('anggaran');
            $anggaran->storeAs('public/anggaran', $anggaran->hashName());
            $data['anggaran'] = $anggaran->hashName();
        }
        $proposal = Proposal::create($data);
        $indikatorIds = Indikator::where('status', 'active')->where('jenis', 'sid')->get()->pluck('id')->toArray();
        $proposal->urusans()->sync($request->urusans);
        $proposal->indikators()->sync($indikatorIds);
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
        $categories = Category::where('status', 'active')->get();
        $skpds = Skpd::where('status', 'active')->get();
        $bentuks = Bentuk::where('status', 'active')->get();
        $urusans = Urusan::where('status', 'active')->get();
        $tematiks = Tematik::where('status', 'active')->orderBy('id')->get();
        $klasifikasis = Klasifikasi::where('status', 'active')->get();
        $tahapans = Tahapan::where('status', 'active')->get();
        $inisiators = Inisiator::where('status', 'active')->get();
        $selectedUrusans = $inovasi->urusans;
        $options = [];
        foreach ($klasifikasis as $klasifikasi) {
            $options[$klasifikasi->id] = [
                'label' => $klasifikasi->nama,
                'children' => [],
            ];
            foreach ($urusans as $urusan) {
                if ($urusan->klasifikasi_id === $klasifikasi->id) {
                    $options[$klasifikasi->id]['children'][$urusan->id] = $urusan->nama;
                }
            }
        }
        if (auth()->user()->id == $inovasi->user_id && $inovasi->status === 'draft') {
            return view('inovasi.edit', compact(
                'inovasi',
                'categories', 
                'skpds', 
                'bentuks', 
                'urusans',
                'tematiks',
                'options',
                'selectedUrusans',
                'tahapans',
                'inisiators'
            ));
        } else{
            return redirect()->back()->with('error', 'kebaikan akan menghasilkan kebaikan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposal $inovasi)
    {
        $this->validate($request, [
            'profil'     => 'mimes:pdf|max:1536',
            'nama'     => 'required',
            'tahapan'   => 'required',
            'inisiator'      => 'required',
            'rancang_bangun' => 'required',
            'tujuan'    => 'required',
            'manfaat' => 'required',
            'hasil' => 'required',
            'ujicoba' => 'required',
            'implementasi' => 'required',
            'anggaran' => 'mimes:pdf|max:1024',
            'bentuk' => 'required',
            'category' => 'required',
            'urusans' => 'required',
            'tematik' => 'required'
        ]);

        $data = [
            'nama' => $request->nama,
            'tahapan_id'   => $request->tahapan,
            'inisiator_id'      => $request->inisiator,
            'rancang_bangun' => addslashes($request->rancang_bangun),
            'tujuan'    => $request->tujuan,
            'manfaat' => $request->manfaat,
            'hasil' => $request->hasil,
            'ujicoba' => $request->ujicoba,
            'implementasi' => $request->implementasi,
            'bentuk_id' => $request->bentuk,
            'category_id' => $request->category,
            'skpd_id' => $request->skpd,
            'tematik_id' => $request->tematik,
            'user_id' => auth()->user()->id,
            'status' => 'draft'
        ];

        if ($request->hasFile('profil')) {
            Storage::delete('public/profil/' . $inovasi->profil);
            $profil = $request->file('profil');
            $profil->storeAs('public/profil', $profil->hashName());
            $data['profil'] = $profil->hashName();
        }

        if ($request->hasFile('anggaran')) {
            Storage::delete('public/anggaran/' . $inovasi->anggaran);
            $anggaran = $request->file('anggaran');
            $anggaran->storeAs('public/anggaran', $anggaran->hashName());
            $data['anggaran'] = $anggaran->hashName();
        }

        $inovasi->update($data);
        $inovasi->urusans()->sync($request->urusans);
        // $indikatorIds = Indikator::where('status', 'active')->where('jenis', 'sid')->get()->pluck('id')->toArray();
        // $inovasi->indikators()->sync($indikatorIds);

        return redirect()->intended('proyek/inovasi')->with(['success' => 'Berhasil update inovasi']);
    }


    /**
     * Send proposal to admin
     * 
     */
    public function sendProposal(Proposal $inovasi)
    {
        if (Auth::user()->role == 'admin' || ($inovasi->user_id === Auth::user()->id)) {
            $status = $inovasi->status === 'sent' ? 'draft' : 'sent';

            $inovasi->update(['status' => $status]);

            return response()->json(['success' => 'Berhasil mengirim proposal']);
        } else {
            return response()->json(['error' => 'Gagal mengirim proposal']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $inovasi)
    {
        if (auth()->user()->id == $inovasi->user_id && $inovasi->status === 'draft') {
            $files = $inovasi->files()->get();
            foreach ($files as $file) {
                $fullFilePath = 'public/docs/' . $file->file;
                Storage::delete($fullFilePath);
            }
            $inovasi->urusans()->detach();
            $inovasi->indikators()->detach();
            $inovasi->files()->delete();
            Storage::delete('public/profil/' . $inovasi->profil);
            Storage::delete('public/anggaran/' . $inovasi->anggaran);
            $inovasi->delete();

            return response()->json(['success' => true]);
        } else{
            return response()->json(['success' => false]);
        }

    }



    public function proposalReport($id)
    {
        $proposal = Proposal::findOrFail($id);
        $files = Indikator::where('status', 'active')->get();
        $pdf = PDF::loadview('inovasi.proposal-report',compact('proposal', 'files'))->setPaper('A4', 'portrait');
        set_time_limit(300);
        return $pdf->stream('proposal-inovasi'.$id.'.pdf');
    }
}
