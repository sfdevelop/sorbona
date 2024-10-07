<?php

namespace App\Http\Livewire\Front\User;

use App\Http\Requests\Livewier\RegisteredUserCollectionRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use phpDocumentor\Reflection\Exception;

class SignUpLiveWier extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $role = 'user';

    protected function rules(): array
    {
        return (new RegisteredUserCollectionRequest)->rules();
    }

    /**
     * @param  $field
     * @return void
     *
     * @throws ValidationException
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function userRegistered(): void
    {
        $data = $this->validate();

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ])->assignRole('user');

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('front.registration_success')]);

            $this->reset([
                'name',
                'email',
                'password',
                'password_confirmation',
            ]);
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.subscribe_error')]);
        }
    }

    public function render()
    {
        return view('livewire.front.user.sign-up-live-wier');
    }
}
