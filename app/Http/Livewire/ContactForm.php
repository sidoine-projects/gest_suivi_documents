<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\EmailContactLeadAction;

class ContactForm extends Component
{

    public string $name = '';
    public string $email = '';

    public string $subject = '';
    public string $message = '';


    protected $rules = [
        'name' => 'required|min:3',
        'subject' => 'required|min:3',
        'email' => 'required|email|min:4',
        'message' => 'nullable',
      
    ];

    protected $messages = [
        'phone.required_if' => 'We need a number to call when the preferred way of contact is by phone.',
    ];

    public function submit()
    {
        // Here lies an empty Livewire action.
  
        $validated = $this->validate();

        (new EmailContactLeadAction)($validated);
        session()->flash('message', 'Message Envoyer avec succès.');
    }






    public function render()
    {
        return view('livewire.contact-form');
    }
}
