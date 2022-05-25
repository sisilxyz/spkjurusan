<?php

namespace App\Http\Controllers;

use App\datauser;
use App\Kriteria;
use App\NilaiUser;
use Illuminate\Http\Request;

class nilaiuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Input Nilai Siswa";
        $data = NilaiUser::all();
        return view('admins.auserspk.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datauser=datauser::all();
        $data_kriteria=Kriteria::all();
        $pagename='Input Nilai';
        return view('public.userspk.create',compact('pagename','datauser','data_kriteria'));
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
            'nilaisiswa'=>'required',
            'id_datauser'=>'required',
            'id_kriteria'=>'required'
        ]);

        $nilaisiswa=new NilaiUser([
            'nilaisiswa'=> $request->get('nilaisiswa'),
            'id_datauser'=> $request->get('id_datauser'),
            'id_kriteria'=> $request->get('id_kriteria')
        ]);

        // dd($datakrijur);

        $nilaisiswa->save();
        return redirect('/userspk/create')->with('sukses', 'Data disimpan');
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
        //
    }
}
