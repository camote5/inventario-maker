<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ComponenteController extends Controller
{
    public function index()
    {
        // Por ahora, para probar que levante la vista, retornamos el componente de Vue
        // (Asegúrate de que 'Componentes/Index' coincida con la ruta de tu archivo Index.vue)
        return Inertia::render('Componentes/Index');
    }
    // Muestra el formulario para agregar el repuesto
    public function create(Request $request)
    {
        return Inertia::render('Componentes/Create', [
            'proyecto_id' => $request->query('proyecto_id')
        ]);
    }

    // Procesa el formulario y guarda la FOTO en el disco duro
    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Máximo 2MB
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            // Guarda la foto físicamente en storage/app/public/componentes
            $rutaImagen = $request->file('imagen')->store('componentes', 'public');
        }

        Componente::create([
            'proyecto_id' => $request->proyecto_id,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('proyectos.show', $request->proyecto_id);
    }

    // FUNCIÓN PARA ELIMINAR EL REPUESTO Y SU FOTO
    public function destroy(Componente $componente)
    {
        $proyecto_id = $componente->proyecto_id;

        // 1. Si el repuesto tiene una foto guardada, la borramos del disco duro
        if ($componente->imagen) {
            Storage::disk('public')->delete($componente->imagen);
        }

        // 2. Borramos el registro de la base de datos
        $componente->delete();

        // 3. Recargamos la pantalla de detalles de la laptop
        return redirect()->route('proyectos.show', $proyecto_id);
    }
}