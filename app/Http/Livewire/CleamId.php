<?php

namespace App\Http\Livewire;

use App\Events\CleamingEvent;
use App\Models\Founder;
use Livewire\Component;
use App\Models\Identification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CleamId extends Component
{
    public $idno;
    public $userInformation;

    public function cleam($id){
      if(Auth::check()){

        $this->userInformation = Founder::join('users', 'founders.user_id', 'users.id')
        ->where('founders.identification_id', $id)
        ->select('users.*')
        ->first();

        $IDType = Identification::join('idtypes', 'identifications.idtype_id', 'idtypes.id')
        ->select('idtypes.id_type')
        ->first();

        if(Auth::id() == $this->userInformation->id){
          session()->flash('cleamFail', 'You are the one who found this ' . $IDType->id_type);
        }
        else{
          Order::create([
            'user_id' => Auth::id(),
            'identification_id' => $id,
            'founder_id' => $this->userInformation->id,
            'status' => '1',
            'rate' => "5",
            'comment' => "I am happy"
            ]);
    
            Identification::where('id', $id)->update([
              'status' => 1
            ]);
            
            $user = User::findOrFail($this->userInformation->id);
            event(new CleamingEvent($user));
    
            session()->flash('cleamSuccess', 'Cleaming for ' . $IDType->id_type . ' has been successful');
        }
      }
      else{
        return redirect('login');
      }
     
    }

    public function share($id){

    }

    public function render()
    {
        $identification = Identification::join('idtypes', 'identifications.idtype_id', 'idtypes.id')
        ->where('identifications.id', $this->idno)
        ->select('identifications.*', 'idtypes.id_type')
        ->first();
        return view('livewire.cleam-id', compact('identification'));
    }
}
