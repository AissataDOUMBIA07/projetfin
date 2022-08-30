<?php

namespace App\Http\Controllers;

use App\Models\Resultats;
use Illuminate\Http\Request;

class ResultatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Resultats::all();
        return view ('resultats.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $rslt = $request->validate(
            [
                'datepub' => ['required', 'date'],
                'fichier' => ['required|mimes:pdf|max:1000']
            ]
        ); 

        if($rslt)
        {
            $fileName = time().'.'.$request->fichier->extension();  
                $request->fichier->move(public_path('resultats/index'), $fileName);
                $crst = Resultats::create(
                [
                    'datepub'=>$request['datepub'],
                    'fichier'=>$fileName,
                ]
            );
        }
        $result = Resultats::create($rslt);
        return redirect('resultats.index', compact('result'));

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resultats  $resultats
     * @return \Illuminate\Http\Response
     */
    public function show(Resultats $resultats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resultats  $resultats
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultats $resultats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resultats  $resultats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultats $resultats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultats  $resultats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultats $resultats)
    {
        //
    }
}
