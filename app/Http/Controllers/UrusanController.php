<?php

namespace App\Http\Controllers;

use App\Models\Urusan;
use Illuminate\Http\Request;
use Auth;

class UrusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $urusans = Urusan::all();
            return view ('admin.urusan', compact('urusans'));
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
        $urusan = new Urusan();
        $urusan->nama = $request->nama;
        $urusan->status = 'active';
        $urusan->save();

        return redirect()->back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Urusan $urusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Urusan $urusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Urusan $urusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Urusan $urusan)
    {
        //
    }
}
