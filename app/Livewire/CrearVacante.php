<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
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
        $this->validate();
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
