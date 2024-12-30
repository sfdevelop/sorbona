<?php

namespace App\Http\Livewire\Cabinet;

use Auth;
use Hash;
use Livewire\Component;

class PasswordEditLiveWier extends Component
{
    public string $oldPassword= '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'oldPassword' => 'required|string',
            'password'              => ['required', 'sometimes'],
            'password_confirmation' => [
                'required', 'sometimes', 'min:6', 'same:password',
            ],
        ];
    }

    public function updatePassword()
    {
        $this->validate();

        $user = Auth::user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => __('front.old_password_error')
            ]);
            return;
        }

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('front.password_success_update')
        ]);

        return redirect()->route('cabinet.info');
    }


    public function render()
    {
        return view('livewire.cabinet.password-edit-live-wier');
    }
}
