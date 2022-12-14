<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Clients;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clt = Clients::count();
        return view ('clients.create', compact('clt'));
    }
    public function tableaubord()
    {
        return view('clients.tableaubord');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $test = $request->validate(
            [
                'nom' => ['required', 'string', 'max:225'],
                'prenom' => ['required', 'string', 'max:225'],
                'telephone' => ['required', 'string', 'max:8'],
                'email' => ['required', 'string', 'max:225', 'unique:users'],
                'password' => ['required', 'string', 'min:5', 'confirmed']
            ]
        );
        if ($test)
        {
            $user = User::create(
                [
                  'name' => $request['nom'],  
                  'prenom' => $request['prenom'],  
                  'email' => $request['email'],  
                  'password' => bcrypt($request['password']),  
                  'status' => 'clients',  
                ]
            );

            if ($user)
            {
                $clients = clients::create(
                    [
                        'userId' => $user->id,
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'telephone' => $request['telephone'],
                        'email' => $request['email'],
                        'password' => bcrypt($request['password']),
                    ]
                );
                return redirect('/login');
            }
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
