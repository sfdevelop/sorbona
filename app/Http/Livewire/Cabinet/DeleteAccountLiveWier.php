<?php

namespace App\Http\Livewire\Cabinet;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
