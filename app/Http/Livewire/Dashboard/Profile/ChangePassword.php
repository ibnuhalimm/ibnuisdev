<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    /**
     * Define properties.
     *
     * @var mixed
     */
    public $current_password;
    public $new_password;

    /**
     * Run validation for `new_password` field.
     *
     * @return void
     */
    public function updatedNewPassword()
    {
        $this->validateOnly('new_password', [
            'new_password' => 'required|min:4',
        ], [], [
            'new_password' => 'New Password',
        ]);
    }

    /**
     * Update password on database.
     *
     * @return void
     */
    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4',
        ], [], [
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
        ]);

        try {
            if (Hash::check($this->current_password, Auth::user()->password) === false) {
                session()->flash('status_color', 'red');
                session()->flash('status_message', 'Sorry, current password doesn\'t match.');

                $this->resetErrorBag();
                $this->reset('current_password', 'new_password');

                return;
            }

            User::where('id', Auth::user()->id)
                ->update([
                    'password' => bcrypt($this->new_password),
                ]);

            session()->flash('status_color', 'green');
            session()->flash('status_message', 'Password sucessfully updated');
        } catch (\Throwable $th) {
            report($th);

            session()->flash('status_color', 'red');
            session()->flash('status_message', 'Sorry, something went wrong');
        }
    }

    /**
     * Render to view.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.profile.change-password');
    }
}
