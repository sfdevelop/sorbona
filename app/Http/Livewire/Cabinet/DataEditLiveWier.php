<?php

namespace App\Http\Livewire\Cabinet;

use App\Rules\InternationalPhoneNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataEditLiveWier extends Component
{
    public string $name = '';

    public string $surname = '';

    public string $email = '';

    public string $phone = '';

    public function mount(): void
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => ['nullable', 'sometimes', 'string', 'email', 'unique:users,email,NULL,id,email,NULL'],
            'phone' => ['nullable', 'sometimes', 'string',  new InternationalPhoneNumber],
        ];
    }

    public function updateData()
    {
        $this->validate();

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => __('данные успешно обновлены')]);

        return redirect()->route('cabinet.info');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.cabinet.data-edit-live-wier');
    }
}
