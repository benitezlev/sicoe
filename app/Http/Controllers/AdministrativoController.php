<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdministrativoController extends Controller
{

    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrativos = Administrativo::all();
        return view('admin.administrativos.index', compact('administrativos'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.administrativos.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cve_servidor' => 'required|string|max:9|unique:administrativos',
            'adscrip' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->cve_servidor);
        $usuario->email = $request->email;
        $usuario->save();
        $usuario->assignRole($request->rol);

        $administrativo = new Administrativo();
        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->cve_servidor = $request->cve_servidor;
        $administrativo->adscrip = $request->adscrip;
        $administrativo->telefono = $request->telefono;
        $administrativo->profesion = $request->profesion;
        $administrativo->save();


        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Administrativo creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $administrativo = Administrativo::findOrFail($id);
        $roles = Role::all();
        return view('admin.administrativos.show', compact('administrativo', 'roles'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $administrativo = Administrativo::findOrFail($id);
        $roles = Role::all();
        return view('admin.administrativos.edit', compact('administrativo', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $administrativo = Administrativo::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,'.$administrativo->usuario->id,
            'cve_servidor' => 'required|string|max:9|unique:administrativos,cve_servidor,'.$administrativo->id,
            'adscrip' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
        ]);

        $usuario = $administrativo->usuario;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->save();
        $usuario->syncRoles($request->rol);


        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->cve_servidor = $request->cve_servidor;
        $administrativo->adscrip = $request->adscrip;
        $administrativo->telefono = $request->telefono;
        $administrativo->profesion = $request->profesion;
        $administrativo->save();


        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Administrativo Actualizado correctamente')
            ->with('icono', 'success');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $administrativo = Administrativo::findOrFail($id);
        $administrativo->delete();
        $administrativo->usuario->delete();

        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Administrativo eliminado correctamente')
            ->with('icono', 'success');
    }
}
