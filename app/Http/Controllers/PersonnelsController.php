<?php

namespace App\Http\Controllers;

use App\Models\Personnels;
use Illuminate\Http\Request;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin = Personnels::count();
        $personnel = Personnels::all();
        return view ('personnels.index', compact('personnel', 'admin'));
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
        $persona = $request->validate(
            [
                'nom' => ['required', 'string'],
                'prenom' => ['required', 'string'],
                'fonction' => ['required', 'string'],
                'telephone' => ['required', 'integer']
            ]
        );
        
        $personnel = Personnels::create($persona);
        return redirect('/Personnels');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnels  $personnels
     * @return \Illuminate\Http\Response
     */
    public function show(Personnels $personnels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personnels  $personnels
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnels $personnels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnels  $personnels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnels $personnels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnels  $personnels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnels $personnels)
    {
        //
    }
}
