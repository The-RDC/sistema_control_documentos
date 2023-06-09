<?php

namespace App\Http\Controllers;


use App\Models\role_has_permissions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('CheckPermissions:role-list', ['only' => ['index','store']]);
        $this->middleware('CheckPermissions:role-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:role-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *syncWithoutDetaching
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success','Rol creado con éxito');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id) ->where('estado', '<>', 0)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
//        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
//            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
//            ->all();

        $rolePermissions = role_has_permissions::where('role_id', $id)
            ->where('estado', '<>', 0)
            ->pluck('permission_id')
            ->toArray();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *: RedirectResponse
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
//dd($request->CheckPermissions);
//        $role->name = $request->input('name');
//        $role->update();
//
//        $role->permissions()->sync($request->input('CheckPermissions'));
//
//        return redirect()->route('roles.index')
//            ->with('success','Role updated successfully');


        $rolePer = role_has_permissions::where('role_id', $role->id)->pluck('permission_id')->toArray();
//        dd($role->id);

        $updateRolePermi = new User();
        foreach ($request->permission as $sos) {
//            echo " - ".$sos." - ";
            $results[] = array("role_id" => $role->id, "permission_id" => $sos);
            foreach ($rolePer as $value) {
                if ($sos != $value) {
                    echo "id Rol-".$role->id." permisos-". $sos." Roles-".$value."<br>";
                    $updateRolePermi->actualizarRolePermission($value, $role->id);
                }
            }
        }
        $role->update($request->all());
        $role->role_has_permissions()->createMany($results);

        return redirect()->route('roles.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
            ->with('success','Rol eliminado con éxito');
    }
}
