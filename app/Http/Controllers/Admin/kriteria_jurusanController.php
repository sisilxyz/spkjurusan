<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Kriteria;
use App\KriteriaJurusan;

class kriteria_jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Kriteria Jurusan";
        $krijur = KriteriaJurusan::all();
        return view('admins.kriteria_jurusan.index', compact('krijur', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_jurusan=Jurusan::all();
        $data_kriteria=Kriteria::all();
        $pagename='Tambah Kriteria Jurusan';
        return view('admins.kriteria_jurusan.create',compact('pagename','data_jurusan','data_kriteria'));
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
            'id_jurusan'=>'required',
            'id_kriteria'=>'required'
        ]);

        $datakrijur=new KriteriaJurusan([
            'id_jurusan'=> $request->get('id_jurusan'),
            'id_kriteria'=> $request->get('id_kriteria')
        ]);

        // dd($datakrijur);

        $datakrijur->save();
        return redirect('/kriteria_jurusan')->with('sukses', 'Data disimpan');

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
        $data_jurusan=Jurusan::all();
        $data_kriteria=Kriteria::all();
        $pagename='Edit Kriteria Jurusan';
        $data=KriteriaJurusan::find($id);
        return view('admins.kriteria_jurusan.edit',compact('data', 'pagename','data_jurusan','data_kriteria'));
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
            'optionid_jurusan'=> 'required',
            'optionid_kriteria'=>'required'
        ]);

        $data = KriteriaJurusan::find($id);
            $data->id_jurusan= $request->get('id_jurusan');
            $data->id_kriteria= $request->get('id_kriteria');

        // dd($data);

        $data->save();
        return redirect('/kriteria_jurusan')->with('sukses', 'Data disimpan');
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
        $data = KriteriaJurusan::find($id);
        $data->delete();
        return redirect('/kriteria_jurusan')->with('sukses', 'Data dihapus');
    }
}
