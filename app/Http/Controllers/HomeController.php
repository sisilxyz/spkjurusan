<?php

namespace App\Http\Controllers;

use App\Bobot;
use App\datauser;
use App\Jurusan;
use App\Kriteria;
use App\KriteriaJurusan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $countdata = datauser::all()->count();
        $countJur = Jurusan::all()->count();
        $countKri = Kriteria::all()->count();
        $countkrijur = KriteriaJurusan::all()->count();
        $countb = Bobot::all()->count();


        return view('home', compact('widget','countJur','countKri','countdata','countkrijur','countb'));
    }
}
