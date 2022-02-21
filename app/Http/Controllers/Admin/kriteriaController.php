<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kriteria;

class kriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Kriteria";
        $data = kriteria::all();
        return view('admins.kriteria.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = "Tambah Data Kriteria";
        return view('admins.kriteria.create', compact('pagename'));
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
            'txtkode_kriteria'=>'required',
            'txtnama_kriteria'=>'required',
            'txtketerangan'=>'required'
            
        ]);

        $datakriteria=new kriteria([
            'kode_kriteria'=>$request->get('txtkode_kriteria'),
            'nama_kriteria'=> $request->get('txtnama_kriteria'),
            'keterangan'=> $request->get('txtketerangan')
        ]);

        // dd($datakriteria);

        $datakriteria->save();
        return redirect('/kriteria')->with('sukses', 'Data disimpan');
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
        $pagename = "Edit Data Kriteria";
        $data = kriteria::find($id);
        return view('admins.kriteria.edit', compact('data', 'pagename'));
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
            'txtkode_kriteria'=>'required',
            'txtnama_kriteria'=>'required',
            'txtketerangan'=>'required' 
        ]);

        $data = kriteria::find($id);
            $data->kode_kriteria= $request->get('txtkode_kriteria');
            $data->nama_kriteria= $request->get('txtnama_kriteria');
            $data->keterangan= $request->get('txtketerangan');


        // dd($data);

        $data->save();
        return redirect('/kriteria')->with('sukses', 'Data disimpan');
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
        $data = kriteria::find($id);
        $data->delete();
        return redirect('/kriteria')->with('sukses', 'Data dihapus');
    }
}
