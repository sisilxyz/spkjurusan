<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bobot;
use App\kriteria;

class bobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Bobot";
        $data = bobot::all();
        return view('admins.bobot.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kriteria=kriteria::all();
        $pagename='Tambah Bobot';
        return view('admins.bobot.create',compact('pagename','data_kriteria'));
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
            'txtkode_bobot'=>'required',
            'optionid_kriteria'=>'required',
            'txtnilai_bobot'=>'required',
            'txtnilai_normalisasi'=>'required'
        ]);

        $databobot=new bobot([
            'kode_bobot'=>$request->get('txtkode_bobot'),
            'id_kriteria'=> $request->get('optionid_kriteria'),
            'nilai_bobot'=> $request->get('txtnilai_bobot'),
            'nilai_normalisasi'=> $request->get('txtnilai_normalisasi')
        ]);

        // dd($databobot);

        $databobot->save();
        return redirect('/bobot')->with('sukses', 'Data disimpan');
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
        $data_kriteria=kriteria::all();
        $pagename='Edit Bobot';
        $data=bobot::find($id);
        return view('admins.bobot.edit',compact('data', 'pagename','data_kriteria'));
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
            'txtkode_bobot'=>'required',
            'optionid_kriteria'=>'required',
            'txtnilai_bobot'=>'required',
            'txtnilai_normalisasi'=>'required'
        ]);

        $data = bobot::find($id);
            $data->kode_bobot= $request->get('txtkode_bobot');
            $data->id_kriteria= $request->get('optionid_kriteria');
            $data->nilai_bobot= $request->get('txtnilai_bobot');
            $data->nilai_normalisasi= $request->get('txtnilai_normalisasi');

        // dd($data);

        $data->save();
        return redirect('/bobot')->with('sukses', 'Data disimpan');
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
        $data = bobot::find($id);
        $data->delete();
        return redirect('/bobot')->with('sukses', 'Data dihapus');
    }
}
