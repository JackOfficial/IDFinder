<?php

namespace App\Http\Livewire;

use App\Events\PostEvent;
use Livewire\Component;
use App\Models\Founder;
use App\Models\Identification;
use App\Models\Idtype;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;

class PostId extends Component
{
    use WithFileUploads;

    public $identification, $name, $idno, $photos = [];

    protected $rules = [
        'identification' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'idno' => ['required', 'string', 'max:255'],
        'photos.*' => ['required', 'file', 'image', 'mimes:jpg,png', 'max:5120'],
    ];

    public function post(){

        $this->validate(); 

        $thephoto = '';
        foreach($this->photos as $photo){
            $getClientOriginalName = $photo->getClientOriginalName();
            $newPhoto = 'IDFinder-'.date('Ymd').'-'.$getClientOriginalName;
            $photo->storeAs('id/photos', $newPhoto, 'public');
            $thephoto = $newPhoto. ", ". $thephoto;
            // $image = $manager->make('storage/dog/photos/'.$newPhoto)->fit(600, 400);
            // $image->save('storage/dog/photos_thumb/'.$newPhoto);
        }

        $identification = Identification::create([
        'idtype_id' => $this->identification,    
        'owner_name' => $this->name,
        'id_number' => $this->idno,
        'photos' => $thephoto,
        ]);

        $founder = Founder::create([
            'user_id' => Auth::id(),
            'identification_id' => $identification->id,
        ]);

        if($founder){
            event(new PostEvent());
            $this->reset('identification' , 'name', 'idno', 'photos');
            session()->flash('postSuccess', 'Identification has been posted successfully');
        }
        else{
            session()->flash('postFail', 'Identification could not be posted');
        }

    }
    public function render()
    {
        $idtypes = Idtype::orderBy('id_type', 'ASC')->get();
        return view('livewire.post-id', compact('idtypes'));
    }
}
