<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jawaban;
use App\Jurusan;
use App\Pertanyaan;
use Illuminate\Http\Request;

class jawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Jawaban";
        $jawaban = Jawaban::all();
        return view('admins.jawaban.index', compact('jawaban', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_pertanyaan=Pertanyaan::all();
        $data_jurusan=Jurusan::all();
        $pagename='Tambah Jawaban';
        return view('admins.jawaban.create',compact('pagename','data_pertanyaan','data_jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_pertanyaan'=>'required',
            'jawaban'=>'required',
            'id_jurusan'=>'required',
            'rating'=>'required'
            
        ]);

        $jawabann=new Jawaban([
            'id_pertanyaan'=> $request->get('id_pertanyaan'),
            'jawaban'=> $request->get('jawaban'),
            'id_jurusan'=> $request->get('id_jurusan'),
            'rating'=> $request->get('rating')
        ]);

        // dd($jawabann);

        $jawabann->save();
        return redirect('/jawaban')->with('sukses', 'Data disimpan');

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
        $data_pertanyaan=Pertanyaan::all();
        $data_jurusan=Jurusan::all();
        $pagename='Edit Jawaban';
        $data=Jawaban::find($id);
        return view('admins.jawaban.create',compact('pagename','data_pertanyaan','data_jurusan'));
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
        $request->validate([
            'id_pertanyaan'=>'required',
            'jawaban'=>'required',
            'id_jurusan'=>'required',
            'rating'=>'required'
            
        ]);

        $data= Jawaban::find($id);
            $data->id_pertanyaan= $request->get('id_pertanyaan');
            $data->jawaban= $request->get('jawaban');
            $data->id_jurusan= $request->get('id_jurusan');
            $data->rating= $request->get('rating');
        
            // dd($jawabann);

        $data->save();
        return redirect('/jawaban')->with('sukses', 'Data disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Jawaban::find($id);
        $data->delete();
        return redirect('/jawaban')->with('sukses', 'Data dihapus');
    }
}
