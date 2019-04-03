<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelUser;

class ControllerUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = ModelUser::all();
        return response()->json($user);
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
        $hasher = app()->make('hash');

        $username = $request->input('username');
        $password = $hasher->make($request->input('password'));
        $fullname = $request->input('fullname');

        $register = ModelUser::create([
            'username' => $username,
            'password' => $password,
            'fullname' => $fullname,
        ]);

        if ($register) {
            return response()->json(['message' => 'Success add!']);
        } else {
            return response()->json(['message' => 'Failed add!']);
        }
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
