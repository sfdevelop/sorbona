<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use App\Rules\InternationalPhoneNumber;
use App\Services\User\CryptUnCryptData;
use Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class SignUpLiveWier extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $mailPhone = '';

    public string $surname = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $role = 'user';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'email' => [
                'nullable', 'sometimes', 'string', 'email',
                'unique:users,email,NULL,id,email,NULL',
            ],
            'phone' => [
                'nullable', 'sometimes', 'string', new InternationalPhoneNumber,
            ],
            'password' => ['required', 'sometimes'],
            'password_confirmation' => [
                'required', 'sometimes', 'min:6', 'same:password',
            ],
            'mailPhone' => ['required', 'string'],
        ];
    }

    protected function validateEmailPhoneItem(): void
    {
        $mailPhone = $this->mailPhone;

        // Видалення всіх символів, крім цифр та '+'
        $cleanedPhone = preg_replace('/[^0-9+]/', '', $mailPhone);

        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            $mailPhone)
        ) {
            $this->email = $mailPhone;
            $this->phone = '';
        } elseif (preg_match('/^\+[1-9]\d{1,14}$/', $cleanedPhone)) {
            $this->email = '';
            $this->phone = $cleanedPhone;
        } else {
            $this->email = '';
            $this->phone = $mailPhone;
            $this->addError('mailPhone',
                'Невірний формат email або телефону. Телефон повинен бути в міжнародному форматі.');
        }
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

    public function userRegistered()
    {
        $this->validateEmailPhoneItem();
        $data = $this->validate();

        try {
            $userData = [
                'name' => $data['name'],
                'surname' => $data['surname'],
                'password' => $data['password'],
                'phone' => $data['phone'],
            ];

            if (! empty($data['email'])) {
                $userData['email'] = $data['email'];
            } else {
                $userData['email'] =
                    null;  // Явно встановлюємо NULL для порожнього email
            }

            $user = User::create($userData);
            $user->assignRole('user');

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',
                    'message' => __('front.registration_success'),
                ]);

            $this->reset([
                'name',
                'email',
                'surname',
                'mailPhone',
                'password',
                'password_confirmation',
            ]);

            Auth::login($user);

            app()->make(CryptUnCryptData::class)->saveEncryptedDataToUser($data['password']);

            return redirect()->intended(route('cabinet.info'));
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.subscribe_error')]);
        }
    }

    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('livewire.front.user.sign-up-live-wier');
    }
}
