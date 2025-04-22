<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();

        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = ModelsRole::all();
        return view('admin.docentes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cve_servidor' => 'required|string|max:9|unique:docentes',
            'adscrip' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->cve_servidor);
        $usuario->save();
        $usuario->assignRole($request->rol);

        $docente = new Docente();
        $docente->usuario_id = $usuario->id;
        $docente->nombre = $request->nombre;
        $docente->cve_servidor = $request->cve_servidor;
        $docente->adscrip = $request->adscrip;
        $docente->telefono = $request->telefono;
        $docente->profesion = $request->profesion;
        $docente->save();

        return redirect()->route('admin.docentes.index')
        ->with('success', 'Docente creado exitosamente.')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = ModelsRole::all();
        $docente = Docente::findOrFail($id);
        return view('admin.docentes.edit', compact('docente', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' .$docente->usuario->id,
            'cve_servidor' => 'required|string|max:9|unique:docentes,cve_servidor,' .$docente->id,
            'adscrip' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
        ]);
        $usuario = $docente->usuario;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->save();
        $usuario->syncRoles($request->rol);

        $docente->usuario_id = $usuario->id;
        $docente->nombre = $request->nombre;
        $docente->cve_servidor = $request->cve_servidor;
        $docente->adscrip = $request->adscrip;
        $docente->telefono = $request->telefono;
        $docente->profesion = $request->profesion;
        $docente->save();

        return redirect()->route('admin.docentes.index')
            ->with('success', 'Docente actualizado exitosamente.')
            ->with('icono', 'success');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
