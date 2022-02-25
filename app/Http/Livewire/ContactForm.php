<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $comment;
    public $success;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'comment' => 'required|min:5',
    ];

    public function contactFormSubmit()
    {
        $contact = $this->validate();
        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['comment'] = $this->comment;

        Mail::to('mihaela.herea@imobiliare.ro')->send(new ContactFormMail($contact));

        $this->success = 'Message sent! Thank you for reaching out to us.';

        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
