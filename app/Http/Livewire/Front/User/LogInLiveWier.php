<?php

namespace App\Http\Livewire\Front\User;

use App\Rules\InternationalPhoneNumber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogInLiveWier extends Component
{
    public string $login = '';
    public string $password = '';

    public function login()
    {
        $loginType = $this->determineLoginType();

        if ($loginType === 'phone' && !$this->validatePhoneNumber()) {
            return;
        }

        if ($this->attemptLogin($loginType) || $this->attemptAlternativeLogin($loginType)) {
            return redirect()->route('cabinet');
        }

        $this->handleFailedLogin();
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.front.user.log-in-live-wier');
    }

    private function determineLoginType(): string
    {
        return filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }

    private function validatePhoneNumber(): bool
    {
        $validator = Validator::make(['phone' => $this->login], [
            'phone' => ['required', new InternationalPhoneNumber()]
        ]);

        if ($validator->fails()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => $validator->errors()->first('phone')
            ]);
            return false;
        }

        return true;
    }

    private function attemptLogin(string $loginType): bool
    {
        $credentials = [
            $loginType => $this->login,
            'password' => $this->password,
        ];

        return Auth::attempt($credentials);
    }

    private function attemptAlternativeLogin(string $loginType): bool
    {
        $alternativeLoginType = $loginType === 'email' ? 'phone' : 'email';
        $alternativeCredentials = [
            $alternativeLoginType => $this->login,
            'password' => $this->password,
        ];

        return Auth::attempt($alternativeCredentials);
    }

    private function handleFailedLogin(): void
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('front.not_login')
        ]);

        $this->reset('password');
    }
}
