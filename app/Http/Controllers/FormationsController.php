<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use App\Models\Personnels;
use Illuminate\Http\Request;

class FormationsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pers = Personnels::all();
        $format = Formations::all();
        return view ('formations.index', compact('format', 'pers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $forma = $request->validate(
            [
                'datedebut' => ['required', 'date'],
                'datefin' => ['required', 'date'],
                'lieu' => ['required', 'string'],
                'montant' => ['required', 'integer'],
                'id_personnels' => ['required', 'integer']
            ]
        );
        $format = Formations::create($forma);
        return redirect('formations.index', compact('format'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function show(Formations $formations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function edit(Formations $formations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formations $formations, $id)
    {
        //
        $validatedata = Formations::find($id);
        $validatedata->datedebut = $request->input('datedebut');
        $validatedata->datefin = $request->input('datefin');
        $validatedata->lieu = $request->input('lieu');
        $validatedata->montant = $request->input('montant');
        $validatedata->id_personnels = $request->input('id_personnels');
        $validatedata->save();

        $fort = Formations::create($validatedata);
        return redirect('/Formations')->with('success', 'Formation mise à jour avec succèss!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formations $formations)
    {
        //
    }
}
