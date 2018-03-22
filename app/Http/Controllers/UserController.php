<?php

namespace App\Http\Controllers;

use App\User;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::all();
        $role = Role::all();
        // foreach ($result as $user) {
        //     dd($user->permissions);
        // }
        return view('users.index',compact('result','role'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id);

        if (auth()->user()->can('supersu')) {
            $user->delete();
            return response()->json($id);
        }else{
            return "No tiene permisos para realizar esta operación.";
        }
    }
    public function agregarPermiso(Request $request)
    {
        $user = User::find($request->id);
        $response = $user->givePermissionTo($request->permiso);
        return response()->json($response);

    }
    public function eliminarPermiso(Request $request)
    {
        $user = User::find($request->id);
        $response = $user->revokePermissionTo($request->permiso);
        return response()->json($response);
    }

}
