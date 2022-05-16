<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pertanyaan;

class pertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Pertanyaan";
        $data = pertanyaan::all();
        return view('admins.pertanyaan.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = "Tambah Data Pertanyaan";
        return view('admins.pertanyaan.create', compact('pagename'));
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
            'kode_pertanyaan'=>'required',
            'pertanyaan'=>'required'  
        ]);

        $datapertanyaan=new pertanyaan([
            'kode_pertanyaan'=>$request->get('kode_pertanyaan'),
            'pertanyaan'=> $request->get('pertanyaan'),
        ]);

        // dd($datapertanyaan);

        $datapertanyaan->save();
        return redirect('/pertanyaan')->with('sukses', 'Data disimpan');
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
        $pagename = "Edit Data Pertanyaan";
        $data = pertanyaan::find($id);
        return view('admins.pertanyaan.edit', compact('data', 'pagename'));
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
            'kode_pertanyaan'=>'required',
            'pertanyaan'=>'required' 
        ]);

        $data = pertanyaan::find($id);
            $data->kode_pertanyaan= $request->get('kode_kriteria');
            $data->pertanyaan= $request->get('pertanyaan');
        // dd($data);

        $data->save();
        return redirect('/pertanyaan')->with('sukses', 'Data disimpan');
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
        $data = pertanyaan::find($id);
        $data->delete();
        return redirect('/pertanyaan')->with('sukses', 'Data dihapus');
    }
}
