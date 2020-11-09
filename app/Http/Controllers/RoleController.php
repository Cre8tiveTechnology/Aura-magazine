<?php

namespace App\Http\Controllers;

use App\Role;
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
        $roles = Role::withTrashed()->latest()->paginate(10);

        return response()->json(['roles' => $roles], 200);
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
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'unique:roles'],
            'description' => ['required', 'string', 'min:10'],
        ]);

        $key = preg_replace('/\s*/', '', $request->name);
        $keytoLower = strtolower($key);

        $data = [
            'name' => $request->name,
            'key' => $keytoLower,
            'description' => $request->description,
            'created_by' => auth()->user()->name,
        ];

        $role = Role::create($data);

        if ($role) {
            return response()->json('Role was created successfully!', 201);
        } else {
            return response()->json(
                'There was a problem while creating role',
                500
            );
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json("Role has been removed successfully.", 200);
        }
    }

    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $role = Role::onlyTrashed()->findOrFail($request->id);
        if ($role->restore()) {
            return response()->json("Role has been restored successfully.", 200);
        }
    }

}
