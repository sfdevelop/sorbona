<?php

namespace App\Http\Livewire\Front\User;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class LogInLiveWier extends Component
{
    public string $email = '';

    public string $password = '';

    /**
     * @return RedirectResponse|void
     */
    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->route('cabinet');
        }

        $this->dispatchBrowserEvent('alert',
            ['type' => 'error', 'message' => __('front.not_login')]);

        $this->reset('password');
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.front.user.log-in-live-wier');
    }
}
