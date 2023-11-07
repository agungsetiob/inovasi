<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Profile;
use App\Models\Proposal;
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
        $carousels = Carousel::all();
        $proposals = Proposal::where('status', 'sent')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return view('visitor.index', compact('proposals', 'carousels'));
    }

    /**
     * Display a listing of the inovation resource.
     */
    public function litbang()
    {
        $carousels = Carousel::all();
        return view('visitor.litbang', compact('carousels'));
    }

    /**
     * Display a listing of the inovation resource.
     */
    public function riset()
    {
        $carousels = Carousel::all();
        return view('visitor.riset', compact('carousels'));
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
    public function show(Proposal $proposal)
    {
        $skpd = $proposal->skpd->nama;
        return response()->json([
            'success' => true,
            'data' => $proposal,
            'skpd' => $skpd
        ]);
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
