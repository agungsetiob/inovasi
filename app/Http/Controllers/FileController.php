<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\File;
use App\Models\Proposal;
use App\Models\Bukti;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proposalId = $id;
        $proposal = Proposal::findOrFail($id);
        $buktis = Bukti::where('status', 'active')->get();
        $indikators = Indikator::where('status', 'active')->get();
        $totalBobot = File::with('bukti')
        ->where('proposal_id', $id)
        ->get()
        ->pluck('bukti.bobot')
        ->sum();
        $files = Indikator::all();
        return view('admin.file', compact(
            'files', 
            'proposal', 
            'buktis', 
            'indikators', 
            'totalBobot', 
            'proposalId',
        ));
    }

    public function bukti($id)
    {
        $files = File::with('bukti')->where('proposal_id', $id)->get();
        return response()->json([
            'success' => true,
            'datax'    => $files
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'informasi' => 'required',
            'bukti' => 'required',
            'file'   => 'nullable|mimes:pdf,mp4,avi|max:71680',
        ]);

        //upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->storeAs('public/docs', $file->hashName());
            //create post
            $file = File::create([
                'file'     => $file->hashName(),
                'informasi'     => addslashes($request->informasi),
                'user_id'   => auth()->user()->id,
                'proposal_id' => $request->proposal_id,
                'bukti_id' => $request->bukti,
                'indikator_id' => $request->indikator_id,
            ]);
        } else {
            $file = File::create([
                'informasi'     => addslashes($request->informasi),
                'user_id'   => auth()->user()->id,
                'proposal_id' => $request->proposal_id,
                'bukti_id' => $request->bukti,
                'indikator_id' => $request->indikator_id,
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $file 
        ]);
        //return redirect()->back()->with('success', 'Evidence uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator $indikator)
    {
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Indikator',
            'data'    => $indikator,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$file = Indikator::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        if (Auth::user()->id == $file->user_id) {
            //delete file
            Storage::delete('public/docs/'. $file->file);

            //delete record
            $file->delete();

            //redirect to index
            return redirect()->back()->with(['success' => 'File deleted']);
        } else{
            return redirect()->back()->with('error', 'ingatlah dunia hanya sementara');
        }
    }
}
