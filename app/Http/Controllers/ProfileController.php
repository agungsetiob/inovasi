<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\File;
use App\Models\Proposal;
use App\Models\Bukti;
use App\Models\Indikator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
        $profiles = Profile::all();
        // $buktis = Bukti::where('status', 'active')->get();
        // $indikators = Indikator::where('status', 'active')->get();
        $dataExist = $profiles->count() > 0;
        return view('profile.index', compact(
            //'buktis', 
            //'indikators', 
            'profiles',
            'dataExist',
        ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
    }

    public function show(Profile $profile)
    {
        $profileId = $profile;
        $buktis = Bukti::where('status', 'active')->get();
        $indikators = Indikator::where('status', 'active')->get();
        // $totalBobot = File::with('bukti')
        // ->where('proposal_id', $id)
        // ->get()
        // ->pluck('bukti.bobot')
        // ->sum();
        $files = Indikator::all();
        return view('profile.detail-profil', compact(
            'files', 
            'profile', 
            'buktis', 
            'indikators', 
            'profileId',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
        return view('profile.create');
        }
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
            'nama'   => 'required',
            'alamat'     => 'required',
            'skpd'  => 'required',
            'email' => 'required|email',
            'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'
        ]);

        //create
        $profile = Profile::create($request->all());
        $indikatorIds = Indikator::where('status', 'active')->where('jenis', 'spd')->get()->pluck('id')->toArray();
        $profile->indikators()->sync($indikatorIds);

        //redirect to index
        return redirect()->back()->with(['success' => 'Profil berhasil disimpan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        if (Auth::user()->role == 'admin') {
            return view('profile.edit', compact('profile'));
        } else{
            return redirect()->back()->with('error', 'kebaikan akan menghasilkan kebaikan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        //validate form
        $this->validate($request, [
            'heading' => 'required|min:5',
            'about'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$profile->image);

            //update post with new image
            $profile->update([
                'image'   => $image->hashName(),
                'heading' => $request->heading,
                'about'   => $request->about
            ]);

        } else {

            //update post without image
            $profile->update([
                'heading' => $request->heading,
                'about'   => $request->about
            ]);
        }

        //redirect to index
        return redirect()->intended('setting/profile')->with(['success' => 'Data updated succesfully']);
    }
}
