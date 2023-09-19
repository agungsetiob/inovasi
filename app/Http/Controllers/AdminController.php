<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

use App\Models\{Post, Category, Contact};
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $totalProposals = Proposal::all()->count();
            $messages = Contact::all()->count();
            $activeUsers = User::where('status', '=', 'active')->count();
            $inactiveUsers = User::where('status', '=', 'inactive')->count();
            return view ('admin.index', 
                compact(
                    'activeUsers', 
                    'inactiveUsers',
                    'messages',
                    'totalProposals'
                ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
    }

    public function user()
    {
        if (Auth::user()->role == 'user') {
            $totalProposals = Proposal::all()->count();
            return view('admin.index', compact('totalProposals'));
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
