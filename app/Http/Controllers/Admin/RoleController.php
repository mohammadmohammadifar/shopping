<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::orderByDesc('created_at')->paginate(5);
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
        ]);

        try {
            DB::beginTransaction();

            $role = Role::create([
                'name'=>$request->name,
                'guard_name'=>'web'
            ]);

            $permission=$request->except('_token','name');
            // dd($permissions);
            $role->givePermissionTo($permission);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('error', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('Tnx','role is Created');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
