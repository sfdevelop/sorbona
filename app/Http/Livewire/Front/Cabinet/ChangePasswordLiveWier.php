<?php

namespace App\Http\Livewire\Front\Cabinet;

use App\Http\Requests\Livewier\UpdateUserPasswordRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use phpDocumentor\Reflection\Exception;

class ChangePasswordLiveWier extends Component
{
    public string $old_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected function rules(): array
    {
        return (new UpdateUserPasswordRequest)->rules();
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

    /**
     * @return RedirectResponse|void
     */
    public function updateUserPassword()
    {
        $data = $this->validate();

        try {
            \Auth::user()->update($data);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Obnovil']);

            return redirect()->route('change.password');
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('admin.error')]);
        }
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        return view('livewire.front.cabinet.change-password-live-wier');
    }
}
