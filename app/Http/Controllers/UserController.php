<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\sucursal;
use App\Models\acceso_usuario_sucursal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth;

class UserController extends Controller
{

    public function index(Request $request): View
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create(): View
    {
        $empleados = empleado::get();
        //$roles = Role::pluck('name','name')->all();
        $roles = Role::get();
        $sucursal = sucursal::get()->whereNull("deleted_at");
        return view('users.create',compact('roles', 'empleados','sucursal'));
    }

    
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            //'roles' => 'required',
            'ids_rol' => 'required',
            'ids_sucursal' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        //$user->assignRole($request->input('roles'));
        $user->assignRole($request->input('ids_rol'));
        
        $acceso_usuario_sucursal= new acceso_usuario_sucursal();
        foreach ($request->ids_sucursal as $ids_sucursales) {
            $acceso_usuario_sucursal->insertarDatosAccesoUsuarioSucursal($user->id, $ids_sucursales);   
        }
        
        return redirect()->route('users.index')
            ->with('success','usuario creado exitosamente');
    }

    
    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

   
    public function edit($id): View
    {
        $empleados = empleado::get();
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $sucursal=sucursal::get();
        return view('users.edit',compact('user','roles','userRole', 'empleados','sucursal'));
    }

    
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    
    public function destroy(User $user): RedirectResponse
    {
        // User::find($id)->delete();
        $user->delete();
        $acceso_usuario_sucursal = new acceso_usuario_sucursal();
        $acceso_usuario_sucursal->where('id_usuario','=',$user->id)->delete();

        return redirect()->route('users.index')
            ->with('success','Usuario Borrado exitosamente');
    }

    public function editUser(Request $request){
        $empleado = empleado::find($request->idEmpleado);
        $user = User::find($request->idUsuario);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.perfil',compact('user', 'roles','userRole','empleado'));
    }

    public function updateUser(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('home')
            ->with('success','User updated successfully');
    }

    public function sucursalesAsignadasAlUsuario()
    {
        session_start();
        $sucursalesAsigandasAlUsuario=acceso_usuario_sucursal::where('id_usuario','=',auth()->user()->id)
                      ->get()
                      ->toArray();
        //dd($sucursalesAsigandasAlUsuario);
        $_SESSION["saludo"]="Hola muchachos";
    }

}
