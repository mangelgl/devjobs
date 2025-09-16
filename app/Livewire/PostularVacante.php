<?php

namespace App\Livewire;

use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = ['cv' => 'required|mimes:pdf'];

    public function mount($vacante)
    {
        $this->vacante = $vacante;
    }

    public function postular()
    {
        $datos = $this->validate();

        /* Almacenar el cv */
        $cv = $this->cv->store('public/cv/');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv'],
        ]);

        $this->vacante->reclutador->notify(
            new NuevoCandidato(
                $this->vacante->id,
                $this->vacante->titulo,
                $this->vacante->user_id,
            )
        );

        return redirect()->back()->with('message', 'Se envió correctamente tu CV. ¡Mucha suerte!');
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
