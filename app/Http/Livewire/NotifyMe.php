<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class NotifyMe extends Component
{
    public $email, $phone;
    public $idtype, $keyword;

    public function save(){
      $wishlist = Wishlist::create([
        'idtype_id' => $this->idtype,
        'keyword' => $this->keyword,
        'email' => $this->email,
        'phone' => $this->phone,
      ]);

      if($wishlist){
        $this->reset('email', 'phone');
        $this->dispatchBrowserEvent('toastr:notifyMe', [
            'message' => 'You will be notified!',
           ]);
      }
    }

    public function render()
    {
        return view('livewire.notify-me');
    }
}
