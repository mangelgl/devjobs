<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{
    use WithFileUploads;

    public $vacanteId;
    public $titulo;
    public $descripcion;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimoDia;
    public $imagen;
    public $imagenNueva;

    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimoDia' => 'required',
        'imagenNueva' => 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacanteId = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->descripcion = $vacante->descripcion;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimoDia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        // Comprueba si hay una imagen nueva
        if ($this->imagenNueva) {
            $imagen = $this->imagenNueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes', '', $imagen);
        }

        // Actualiza la vacante
        $vacante = Vacante::find($this->vacanteId);
        $vacante->titulo = $datos['titulo'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimoDia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        // Guarda y redirecciona
        $vacante->save();
        return redirect()->route('vacantes.index')->with('message', 'Vacante actualizada correctamente.');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
