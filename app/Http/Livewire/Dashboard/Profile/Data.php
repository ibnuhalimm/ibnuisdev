<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Data extends Component
{
    /**
     * Define properties
     *
     * @var mixed
     */
    public $name;
    public $username;
    public $email;

    /**
     * Form validation rules
     *
     * @return array
     */
    protected function formValidationRules()
    {
        return [
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email|max:100|unique:users,email,' . Auth::user()->id
        ];
    }

    /**
     * Initialize properties data
     *
     * @return void
     */
    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
    }

    /**
     * Run form validation after updated properties
     *
     * @return void
     */
    public function updated($field_name)
    {
        $this->validateOnly($field_name, $this->formValidationRules(), [], []);
    }

    /**
     * Update profile data
     *
     * @return void
     */
    public function updateProfil()
    {
        $this->validate($this->formValidationRules(), [], []);

        try {
            User::where('id', Auth::user()->id)
                ->update([
                    'name' => Str::of($this->name)->trim(),
                    'email' => Str::of($this->email)->trim()->lower()
                ]);

            session()->flash('status_color', 'green');
            session()->flash('status_message', 'Profile successfully updated');

        } catch (\Throwable $th) {
            report($th);

            session()->flash('status_color', 'red');
            session()->flash('status_message', 'Sorry, something went wrong');
        }

    }

    /**
     * Render to view
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.profile.data');
    }
}
