<?php

namespace App\Http\Controllers;

use App\Models\Examens;
use Illuminate\Http\Request;

class ExamensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exam = Examens::all();
        return view ('examens.index', compact('exam'));
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
        $ex = $request->validate(
            [
                'datedebut' => ['required', 'date'],
                'datefin' => ['required', 'date'],
                'lieu' => ['required', 'string'],
                'heure' => ['required', 'string'],
                'type' => ['required', 'string']
            ]
        );
        $exam = Examens::create($ex);
        return redirect('/Examens');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function show(Examens $examens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function edit(Examens $examens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examens $examens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examens $examens)
    {
        //
    }
}
