<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Identification;

class SearchId extends Component
{
    public $identifications, $keyword;

    protected $messages = [
        'keyword.required' => 'Please enter your name or ID number to search for'
    ];

    protected $rules = [
        'keyword' => 'required|string|max:255'
    ];

    public function mount(){
        $this->identifications = collect();
    }

    public function search(){

        $this->validate();
        
        $this->identifications = Identification::where('owner_name', 'Like', '%' . $this->keyword . '%')
        ->orWhere('id_number', 'Like', '%' . $this->keyword . '%')
        ->get();
     }

    public function render()
    {
        return view('livewire.search-id');
    }
}
