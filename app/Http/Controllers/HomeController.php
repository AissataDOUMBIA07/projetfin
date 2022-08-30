<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdministrateursController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\VoituresController;
use App\Models\Personnels;
use App\Models\Clients;
use App\Models\Voitures;

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
            // statistique pour admin
            $psnels = Personnels::count();
            // fin statistique

            // statistique pour clients
            $clts = Clients::count();
            // fin statistique

            // statistique pour voitures
            $vtre = Voitures::count();
            // fin statistique
            return view('administrateurs.tableaubord', compact('psnels', 'vtre', 'clts'));
        } 
        else if ($user->status == 'clients'){
            // statistique pour admin
            $psnels = Personnels::count();
            // fin statistique

            // statistique pour clients
            $clts = Clients::count();
            // fin statistique

            // statistique pour voitures
            $vtre = Voitures::count();
            // fin statistique
            return view('clients.tableaubord', compact('psnels', 'vtre', 'clts'));
        }


        
        else{
            return view('welcome');
        }
    }
}
