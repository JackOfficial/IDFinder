<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;

class SubscribeComponent extends Component
{
    public $email;
    
    protected $rules = [
        'email' => 'required|email|string|max:255|unique:subscribers'
    ];

    protected $messages = [
        'email.unique' => 'This email has already subscribed'
    ];

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email|string|max:255|unique:subscribers'
        ]);
    }

    public function subscribe(){
        
        $this->validate();
        
        $subscription = Subscriber::create([
         'email' => $this->email
        ]);

        if($subscription){
           $this->dispatchBrowserEvent('swal:subscribe', [
            'type' => 'success',
            'title' => 'You have subscribed',
            'text' => '',
           ]);
        }
        else{
            $this->dispatchBrowserEvent('toastr:subscribe', [
                'message' => 'You have already subscribed!',
               ]);
        }
    }
    
    public function render()
    {
        return view('livewire.subscribe-component');
    }
}
