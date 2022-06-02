<?php

namespace App\Http\Controllers;

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
        $pagename='Input Nilai';
        return view('public.userspk.create',compact('pagename'));
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
            'nama'=>'required',
            'nisn'=>'required',
            'matematika'=>'required',
            'ipa'=>'required',
            'ips'=>'required',
            'bing'=>'required',
            'bindo'=>'required',
            'tik'=>'required'
        ]);

        $nilaisiswa=new NilaiUser([
            'nama'=> $request->get('nama'),
            'nisn'=> $request->get('nisn'),
            'matematika'=> $request->get('matematika'),
            'ipa'=>$request->get('ipa'),
            'ips'=> $request->get('ips'),
            'bing'=> $request->get('bing'),
            'bindo'=> $request->get('bindo'),
            'tik'=> $request->get('tik'),
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
