<?php

namespace App\Http\Livewire\Front\Cabinet;

use App\Http\Requests\Livewier\UpdateCabinetInfoRequest;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use phpDocumentor\Reflection\Exception;

class InfoLiveWier extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    protected function rules(): array
    {
        return (new UpdateCabinetInfoRequest)->rules();
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

    public function mount(): void
    {
        $this->name = \Auth::user()->name;
        $this->email = \Auth::user()->email;
        $this->phone = \Auth::user()->phone ?? '';
    }

    public function updateUser(): void
    {
        $data = $this->validate();

        try {
            \Auth::user()->update(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]
            );

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('toastr.save_front_ok')]);
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.subscribe_error')]);
        }
    }

    public function render()
    {
        return view('livewire.front.cabinet.info-live-wier');
    }
}
