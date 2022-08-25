<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdministrateursController;
use App\Http\Controllers\ClientsController;

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
        $user =  Auth::user();
        if($user->status == 'administrateurs'){
            return view('administrateurs.tableaubord');
        } 
        else if ($user->status == 'clients'){
            return view('clients.tableaubord');
        }
        else{
            return view('welcome');
        }
    }
}
