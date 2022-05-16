<?php

namespace App\Http\Controllers;

use App\datauser;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\datausers;
use App\Imports\datauserImport;
use App\Imports\UsersImport;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class datauserimportController extends Controller
{
    public function index()
    {
        $users = datauser::latest()->get();
        return view('admins.datauser.index', compact('users'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // $file = $request->file('file');

        // //temporary file
        // $path = $file->storeAs('public/excel/',$file);

        // // import data
        // $import = Excel::import(new datauserImport(), storage_path('app/public/excel/'.$file));

        // //remove from server
        // Storage::delete($path);
 
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
    
        $path = $request->file('file');
    
            Excel::import(new datauserImport, $path);        
        
         FacadesSession::flash('success', 'Leave Records Imported Successfully');
          return redirect()->route('users.index');  
      

        // if($import) {
        //     //redirect
        //     return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diimport!']);
        // } else {
        //     //redirect
        //     return redirect()->route('users.index')->with(['error' => 'Data Gagal Diimport!']);
        // }
    }

}
