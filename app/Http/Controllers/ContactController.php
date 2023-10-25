<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use Barryvdh\DomPDF\Facade\PDF;
use Auth;
use URL;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $messages = Contact::all();
            return view('admin.message', compact('messages'));
        }else{
            return back()->with('error', 'Aku pasrahkan hidupku padamu Tuhan');
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
        $url = URL('/') . '#contact';
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required|min:25'
        ]);

        //create 
        if ($validator->fails()) {
            return redirect($url)
            ->withErrors($validator)
            ->withInput();
        } else{
            Contact::create([
            'name'    => addslashes($request->name),
            'email'   => $request->email,
            'message' => $request->message
        ]);

        //redirect to index
            return redirect($url)->with('success', 'Message sent');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role == 'admin') {
            $mes = Contact::findOrFail($id);
            $mes->delete();

        //redirect to index
            return redirect('messages')->with(['success' => 'Data deleted succesfully']);
        } else{
            return redirect()->back()->with('error', 'ingatlah dunia hanya sementara');
        }
    }

    /**
     * Cetak laporan messages
     *
     * 
     * 
     */
    public function messagesReport($startdate, $enddate)
    {
        $messages = Contact::whereBetween('created_at',[$startdate, $enddate])->get();
        $total = Contact::all()->count();
        $pdf = PDF::loadview('admin.messages-report',['messages' => $messages, 'total' => $total
        ])->setPaper('A4', 'portrait');
        set_time_limit(300);
        return $pdf->stream('messages.pdf');
    }



}
