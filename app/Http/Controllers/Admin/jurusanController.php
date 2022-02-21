<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\jurusan;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $pagename = "Jurusan";
            $data = jurusan::all();
            return view('admins.jurusan.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = "Tambah Data Jurusan";
        return view('admins.jurusan.create', compact('pagename'));
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
            'txtkode_jurusan'=>'required',
            'txtnama_jurusan'=>'required'
        ]);

        $datajurusan=new jurusan([
            'kode_jurusan'=>$request->get('txtkode_jurusan'),
            'nama_jurusan'=> $request->get('txtnama_jurusan')
        ]);

        // dd($datajurusan);

        $datajurusan->save();
        return redirect('/jurusan')->with('sukses', 'Data disimpan');
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
        $pagename = "Edit Data Jurusan";
        $data = jurusan::find($id);
        return view('admins.jurusan.edit', compact('data', 'pagename'));
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
            'txtkode_jurusan'=>'required',
            'txtnama_jurusan'=>'required'
    ]);

  // dd($datajurusan);

    $data = jurusan::find($id);

            $data->kode_jurusan = $request->get('txtkode_jurusan');
            $data->nama_jurusan= $request->get('txtnama_jurusan');

    $data->save();
    return redirect('/jurusan')->with('sukses', 'Data diupdate');

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
        $data = jurusan::find($id);
        $data->delete();
        return redirect('/jurusan')->with('sukses', 'Data dihapus');
    }
}
