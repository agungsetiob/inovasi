<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visitor.cover');
    }

    /**
     * Display a listing of the inovation resource.
     */
    public function inovasi()
    {
        $profiles = Profile::all();
        return view('visitor.index', compact('profiles'));
    }

    /**
     * Display a listing of the inovation resource.
     */
    public function litbang()
    {
        $profiles = Profile::all();
        return view('visitor.litbang', compact('profiles'));
    }

    /**
     * Display a listing of the inovation resource.
     */
    public function riset()
    {
        $profiles = Profile::all();
        return view('visitor.riset', compact('profiles'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
