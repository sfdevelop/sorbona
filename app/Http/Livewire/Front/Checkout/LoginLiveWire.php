<?php

namespace App\Http\Livewire\Front\Checkout;

use App\Http\Livewire\Product\ProductBaseComponent;
use App\Rules\InternationalPhoneNumber;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginLiveWire extends ProductBaseComponent
{
    public string $login = '';

    public string $password = '';

    private array $loginRules = [
        'login' => 'required|string',
        'password' => 'required|string',
    ];

    public function doLogin()
    {
        $this->validate($this->loginRules);

        $loginType = $this->determineLoginType();

        if ($loginType === 'phone' && ! $this->validatePhoneNumber()) {
            return;
        }

        if ($this->attemptLoginCo($loginType) || $this->attemptAlternativeLoginCo($loginType)) {
            return redirect()->route('checkout');
        }

        $this->handleFailedLoginCo();
    }

    private function attemptLoginCo(string $loginType): bool
    {
        $credentials = [
            $loginType => $this->login,
            'password' => $this->password,
        ];

        return Auth::attempt($credentials);
    }

    private function attemptAlternativeLoginCo(string $loginType): bool
    {
        $alternativeLoginType = $loginType === 'email' ? 'phone' : 'email';
        $alternativeCredentials = [
            $alternativeLoginType => $this->login,
            'password' => $this->password,
        ];

        return Auth::attempt($alternativeCredentials);
    }

    private function handleFailedLoginCo(): void
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('front.not_login'),
        ]);

        $this->reset('password');
    }

    private function determineLoginType(): string
    {
        return filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }

    private function validatePhoneNumber(): bool
    {
        $validator = Validator::make(['phone' => $this->login], [
            'phone' => ['required', new InternationalPhoneNumber],
        ]);

        if ($validator->fails()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => $validator->errors()->first('phone'),
            ]);

            return false;
        }

        return true;
    }

    /**
     * @return View
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): View
    {
        return view('livewire.front.checkout.login-live-wire');
    }
}
