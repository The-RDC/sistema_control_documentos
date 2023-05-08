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


    public function cambioDeSucursalATrabajar(Request $request)
    {
        for ($i=0; $i < count(session('idsSucursalesUsuario')); $i++) 
        { 
           if (session('idsSucursalesUsuario')[$i] == $request->idSucursalSeleccionadaParaTrabajar) 
           {
                session(['idSucursalTrabajandoActualemte'=>$i]);
                break;
           } 
        }
        return redirect()->route('home');//view('dashboard-admin.admin');
    }


    public function sucursalesAsignadasAlUsuario()
    {  
        $sqlSucursalesDelUsuario = DB::table('sucursales')
                      ->join('acceso_usuario_sucursals', 'sucursales.id', '=', 'acceso_usuario_sucursals.id_sucursal')
                      ->join('users', 'acceso_usuario_sucursals.id_usuario', '=', 'users.id')
                      ->where('users.id','=',auth()->user()->id)
                      ->whereNull("users.deleted_at")
                      ->whereNull("sucursales.deleted_at")
                      ->whereNull("acceso_usuario_sucursals.deleted_at")
                      ->select('users.id as id_usuario','sucursales.id as id_sucursal','sucursales.nombre_sucursal','sucursales.direccion_sucursal')
                      ->get()
                      ->toArray();
        $idsSucursalesUsuario=array();
        $nombreSucursalesUsuario=array();
        $direccionSucursalesusuario=array();

        for ($i=0; $i < count($sqlSucursalesDelUsuario); $i++) {
            array_push($idsSucursalesUsuario, $sqlSucursalesDelUsuario[$i]->id_sucursal);
            array_push($nombreSucursalesUsuario,$sqlSucursalesDelUsuario[$i]->nombre_sucursal);
            array_push($direccionSucursalesusuario,$sqlSucursalesDelUsuario[$i]->direccion_sucursal);
        }      
        session(['idsSucursalesUsuario'=>$idsSucursalesUsuario]);
        session(['nombreSucursalesUsuario'=>$nombreSucursalesUsuario]);
        session(['direccionSucursalesusuario'=>$direccionSucursalesusuario]);

        if(session('idSucursalTrabajandoActualemte') == NULL)
        {
           session(['idSucursalTrabajandoActualemte'=>0]); //por defecto la sucursal en la posicion 0 es con la que se esta trabajado
        }  
    }

}
