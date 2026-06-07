<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProyectoController extends Controller
{
    // Muestra la tabla principal con todas las laptops
    public function index()
    {
        $proyectos = Proyecto::all();
        return Inertia::render('Proyectos/Index', [
            'proyectos' => $proyectos
        ]);
    }

    // Muestra el formulario para registrar una laptop
    public function create()
    {
        return Inertia::render('Proyectos/Create');
    }

    // Guarda la laptop en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index');
    }

    // Muestra los detalles de una laptop específica y sus repuestos
    public function show(Proyecto $proyecto)
    {
        $proyecto->load('componentes');
        return Inertia::render('Proyectos/Show', [
            'proyecto' => $proyecto
        ]);
    }
}