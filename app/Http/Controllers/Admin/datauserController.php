<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\datauser;

class datauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = "Data User";
        $datausr = datauser::all();
        return view('admins.datauser.index', compact('datausr', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = "Tambah Data Siswa";
        return view('admins.datauser.create', compact('pagename'));
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
            'txtnisn'=>'required',
            'txtnama'=>'required'
        ]);

        $data_user=new datauser([
            'nisn'=>$request->get('txtnisn'),
            'nama'=> $request->get('txtnama')
        ]);

        // dd($data_user);

        $data_user->save();
        return redirect('/datauser')->with('sukses', 'Data disimpan');

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
        $pagename = "Edit Data User";
        $datausr = datauser::find($id);
        return view('admins.datauser.edit', compact('datausr', 'pagename'));
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
            'txtnisn'=>'required',
            'txtnama'=>'required'
    ]);

  // dd($data_user);

    $datausr = datauser::find($id);

            $datausr->nisn = $request->get('txtnisn');
            $datausr->nama= $request->get('txtnama');

    $datausr->save();
    return redirect('/datauser')->with('sukses', 'Data diupdate');

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
        $datausr = datauser::find($id);
        $datausr->delete();
        return redirect('/datauser')->with('sukses', 'Data dihapus');
    }
}
