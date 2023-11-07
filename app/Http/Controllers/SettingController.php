<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $settings = Setting::all();
            $dataExist = $settings->count() > 0;
            return view('setting.setting', compact(
                'settings',
                'dataExist',
            ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
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
        if (Auth::user()->role == 'admin') {
            $this->validate($request, [
                'nama_sistem'   => 'required',
                'alamat'     => 'required',
                'tentang'   => 'required',
                'logo_pemkab' => 'mimes:png|max:300',
                'logo_sistem' => 'mimes:png:512'
            ]);
            if ($request->hasFile('logo_sistem')) {
                $sistem = $request->file('logo_sistem');
                $sistem->storeAs('public/system', $sistem->hashName());
            }
            if ($request->hasFile('logo_pemkab')) {
                $pemkab = $request->file('logo_pemkab');
                $pemkab->storeAs('public/system', $pemkab->hashName());
            }
            Setting::create([
                'logo_sistem' => $sistem->hashName(),
                'logo_pemkab' => $pemkab->hashName(),
                'nama_sistem' => $request->nama_sistem,
                'tentang' => $request->tentang,
                'alamat' => $request->alamat
            ]);
            return response()->json(['success' => true, 'message' => 'Berhasil gan uhuy']);
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
