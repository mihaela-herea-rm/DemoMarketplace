<?php

namespace Tests\Unit;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMail;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest  extends TestCase
{
    use DatabaseTransactions;

    /** @test*/
    public function register_page_contain_livewire_component()
    {
        $this->get('/contact')->assertSeeLivewire('contact-form');
    }

    /** @test */
    public function a_visitor_can_send_a_feedback()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.contact@gmail.com')
            ->set('comment', 'Some feedback here')
            ->assertSet('success', null)
            ->call('contactFormSubmit')
            ->assertSet('success', 'Message sent! Thank you for reaching out to us.');
    }

    /** @test */
    public function email_is_sent()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.contact@gmail.com')
            ->set('comment', 'Some feedback here')
            ->call('contactFormSubmit');

        Mail::assertSent(function (ContactFormMail $mail) {
            $mail->build();

            return $mail->hasTo('mihaela.herea@imobiliare.ro') &&
                $mail->hasFrom('mihaela.contact@gmail.com') &&
                $mail->subject === 'Demo Marketplace Contact';
        });
    }

    /** @test */
    public function a_visitor_cannot_send_a_feedback_without_email()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Mihaela Test')
            ->set('email', '')
            ->set('comment', 'Some feedback here')
            ->call('contactFormSubmit')
            ->assertHasErrors('email');
    }

    /** @test */
    public function a_visitor_cannot_send_a_feedback_without_name()
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->set('email', 'mihaela.contact@gmail.com')
            ->set('comment', 'Some feedback here')
            ->call('contactFormSubmit')
            ->assertHasErrors('name');
    }

    /** @test */
    public function a_visitor_cannot_send_a_feedback_without_message()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.contact@gmail.com')
            ->set('comment', '')
            ->call('contactFormSubmit')
            ->assertHasErrors('comment');
    }

    /** @test */
    public function a_visitor_cannot_send_a_feedback_without_data()
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->set('email', '')
            ->set('comment', '')
            ->call('contactFormSubmit')
            ->assertHasErrors(['name', 'email', 'comment']);
    }
}
