<?php

namespace App\Http\Controllers;

use App\Models\Programmes;
use App\Models\Personnels;
use Illuminate\Http\Request;

class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pgrm = Personnels::all();
        $programe = Programmes::all();
        return view ('programmes.index', compact('programe', 'pgrm'));
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
        $program = $request->validate(
            [
                'programme' => ['required', 'string'],
                'datedebut' => ['required', 'date'],
                'datefin' => ['required', 'date'],
                'heure' => ['required', 'string'],
                'id_personnels' => ['required', 'integer']
            ]
        );
        $programe = Programmes::create($program);
        return redirect('/Programmes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programmes  $programmes
     * @return \Illuminate\Http\Response
     */
    public function show(Programmes $programmes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programmes  $programmes
     * @return \Illuminate\Http\Response
     */
    public function edit(Programmes $programmes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programmes  $programmes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programmes $programmes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programmes  $programmes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programmes $programmes)
    {
        //
    }
}
