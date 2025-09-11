<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria = '';
    public $empresa;
    public $ultimoDia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimoDia' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        /* Almacenar la imagen */
        $imagen = $this->imagen->store('public/vacantes/');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        /* Crear la vacante */
        Vacante::create([
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimoDia'],
            'imagen' => $datos['imagen'],
            'user_id' => Auth::user()->id,
        ]);

        /* Redireccionar al usuario */
        return redirect()->route('vacantes.index')->with('message', 'Vacante creada correctamente.');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
