<?php

namespace App\Http\Livewire\FrontEnd;

use App\Message;
use Livewire\Component;

class MessageForm extends Component
{
    /**
     * Define properties
     *
     * @var mixed
     */
    public $name;
    public $email;
    public $body;

    /**
     * Form validation rules
     *
     * @return array
     */
    private function formValidatioRules()
    {
        return [
            'name' => [ 'required', 'string', 'min:3', 'max:40' ],
            'email' => [ 'required', 'email', 'max:100' ],
            'body' => [ 'required', 'min:10' ]
        ];
    }

    /**
     * Form validation messages
     *
     * @return array
     */
    private function formValidatioMessages()
    {
        return [
            'min' => 'The :attribute field is too short.',
            'max' => 'The :attribute field is too long.',
        ];
    }

    /**
     * Form validation attributes
     *
     * @return array
     */
    private function formValidatioAttributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'body' => 'Message'
        ];
    }

    /**
     * Realtime form validation
     *
     * @param string $property_name
     * @return void
     */
    public function updated($property_name)
    {
        $this->validateOnly($property_name,
                            $this->formValidatioRules(),
                            $this->formValidatioMessages(),
                            $this->formValidatioAttributes());
    }

    /**
     * Send the message
     *
     * @return void
     */
    public function sendMessage()
    {
        $this->validate($this->formValidatioRules(), $this->formValidatioMessages(), $this->formValidatioAttributes());

        try {
            Message::create([
                'name' => $this->name,
                'email' => $this->email,
                'message' => trim($this->body)
            ]);

            $this->reset('name', 'email', 'body');

            session()->flash('alert-status', 'green');
            session()->flash('alert-title', 'Success');
            session()->flash('alert-body', 'Thank your for contacting me, I will reply your email soon. :)');

        } catch (\Throwable $th) {
            report($th);

            session()->flash('alert-status', 'red');
            session()->flash('alert-title', 'Error');
            session()->flash('alert-body', 'Oops, sorry something went wrong. :(');

        }
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.front-end.message-form');
    }
}
