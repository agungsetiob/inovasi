<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $faqs = Faq::all();
        return view ('admin.faq', compact('faqs'));
        } else {
            return redirect()->back()->with(['error' => 'Hok a hok e!']);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'question'     => 'required|min:10',
            'answer'   => 'required|min:10'
        ]);

        //create post
        Faq::create([
            'question' => addslashes($request->question),
            'answer'   => addcslashes($request->answer)
        ]);

        return redirect()->back()->with(['success' => 'Data saved succesfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question'     => 'required|min:10',
            'answer'   => 'required|min:10'
        ]);

        $faq->update([
            'question' => addslashes($request->question),
            'answer'   => addslashes($request->answer)
        ]);

        return redirect()->back()->with(['success' => 'Data updated succesfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with(['success' => 'Data deleted succesfully']);

    }
}
