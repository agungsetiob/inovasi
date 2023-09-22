<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

use App\Models\{Category, Contact};
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $totalProposals = Proposal::all()->count();
            $chartTahapan = Proposal::select(DB::raw('tahapan_inovasi, count(id) as total'))
            ->groupBy('tahapan_inovasi')
            ->orderBy('tahapan_inovasi','asc')
            ->get()
            ->pluck('total');

            $chartJenis = Proposal::select(DB::raw('category_id, count(id) as total2'))
            ->groupBy('category_id')
            ->orderBy('category_id', 'asc')
            ->get()
            ->pluck('total2');

            //dd($chartSkpd);
            $messages = Contact::all()->count();
            $activeUsers = User::where('status', '=', 'active')->count();
            $inactiveUsers = User::where('status', '=', 'inactive')->count();

            $labelTahapan = Proposal::select(DB::raw('DISTINCT(tahapan_inovasi)'))
            ->orderBy('tahapan_inovasi', 'asc')
            ->get()
            ->pluck('tahapan_inovasi');

            $labelJenis = Category::whereHas('proposals')->pluck('name')->unique();

            return view ('admin.index', 
                compact(
                    'activeUsers', 
                    'inactiveUsers',
                    'totalProposals',
                    'messages',
                    'chartTahapan',
                    'labelTahapan',
                    'chartJenis',
                    'labelJenis'
                ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
    }

    public function user()
    {
        if (Auth::user()->role == 'user') {
            $totalProposals = Proposal::all()->count();
            $chartTahapan = Proposal::select(DB::raw('tahapan_inovasi, count(id) as total'))
            ->groupBy('tahapan_inovasi')
            ->orderBy('tahapan_inovasi','asc')
            ->get()
            ->pluck('total');

            $chartJenis = Proposal::select(DB::raw('category_id, count(id) as total2'))
            ->groupBy('category_id')
            ->orderBy('category_id', 'asc')
            ->get()
            ->pluck('total2');

            $labelTahapan = Proposal::select(DB::raw('DISTINCT(tahapan_inovasi)'))
            ->orderBy('tahapan_inovasi', 'asc')
            ->get()
            ->pluck('tahapan_inovasi');

            $labelJenis = Category::whereHas('proposals')->pluck('name')->unique();
            return view('admin.index', compact('totalProposals', 'chartJenis', 'chartTahapan', 'labelJenis', 'labelTahapan'));
        }else
      {
        return redirect()->back();
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
