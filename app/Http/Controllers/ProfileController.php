<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
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
            'heading'   => 'required',
            'about'     => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create
        Profile::create([
            'image'     => $image->hashName(),
            'heading'   => $request->heading,
            'about'     => $request->about,
        ]);

        //redirect to index
        return redirect()->intended('setting/profile')->with(['success' => 'Profile saved succesfully']);
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
