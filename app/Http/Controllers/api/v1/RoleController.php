<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $role = Role::where('id', $id)->get();
        return response()->json($role, 200);
    }

  
}
