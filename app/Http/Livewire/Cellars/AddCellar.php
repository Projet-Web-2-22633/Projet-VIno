<?php

namespace App\Http\Livewire\Cellars;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cellar;

class AddCellar extends Component
{
    public $nom;

    protected $rules = [
        'nom' => 'required|string|max:255',
    ];

    protected $messages = [
        'nom.required' => 'Le champ Nom est obligatoire.',
        'nom.string' => 'Le champ Nom doit être une chaîne de caractères.',
        'nom.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',
    ];

    public function store()
    {
        $this->validate();

        $userId = Auth::check() ? Auth::id() : null;
       
        Cellar::create([
            'name' => $this->nom,
            'user_id' => $userId
        ]);

        $cellarInf = Cellar::where('user_id', $userId)->get()->map(function ($cellar) {
            return [
                'id' => $cellar->id,
                'name' => $cellar->name,
            ];
        })->toArray();

        session()->put('cellar_inf', $cellarInf);
        $cellarInf =  session()->get('cellar_inf');

        session()->flash('message', 'Cellier ajouté avec succès.');      
        $this->reset('nom');
    }

    public function render()
    {
        return view('livewire.Cellars.add-cellar');
    }
}
