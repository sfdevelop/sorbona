<?php

namespace App\Http\Livewire\Cabinet;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeleteAccountLiveWier extends Component
{
    public function deleteAccount()
    {
        $user = Auth::user();

        $user->delete();

        Auth::logout();

        return redirect()->route('home');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.cabinet.delete-account-live-wier');
    }
}
