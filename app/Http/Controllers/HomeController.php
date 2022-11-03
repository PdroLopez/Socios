<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use App\Bingo as bingo;
use App\Participante as participante;
use App\Boleto as boleto;
use DB;

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
        if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2) {
          return view('private.superadmin.index');
        }elseif(Auth::user()->rol_id == 3){
          return redirect('private/juegos');
        }
    }
    


}
