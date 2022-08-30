<?php

namespace App\Http\Controllers;

use App\Models\Voitures;
use App\Models\Personnels;
use Illuminate\Http\Request;

class VoituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin1 = Voitures::count();
        $vtr = Personnels::all();
        $voiture = Voitures::all();
        return view ('voitures.index', compact('voiture', 'vtr', 'admin1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $voito = $request->validate(
            [
                'numero' => ['required', 'string', 'max:225'],
                'libelle' => ['required', 'string', 'max:225'],
                'couleur' => ['required', 'string', 'max:255'],
                'id_personnels' => ['required', 'integer', 'max:225']
            ]
        );
        $voiture = Voitures::create($voito); 
        return redirect ('/Voitures');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Http\Response
     */
    public function show(Voitures $voitures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Http\Response
     */
    public function edit(Voitures $voitures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voitures $voitures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voitures  $voitures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voitures $voitures)
    {
        //
    }
}
