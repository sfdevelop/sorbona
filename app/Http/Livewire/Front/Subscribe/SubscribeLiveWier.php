<?php

namespace App\Http\Livewire\Front\Subscribe;

use App\Http\Requests\Livewier\subscribeRequest;
use App\Models\Subscribe;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class SubscribeLiveWier extends Component
{
    public string $email = '';

    /**
     * @return array
     */
    protected function rules(): array
    {
        return (new subscribeRequest)->rules();
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
     * @return void
     */
    public function subscribe(): void
    {
        $data = $this->validate();

        try {
            Subscribe::create($data);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('front.successfully_joined')]);

            $this->reset('email');
        } catch (\Exception $exception) {
            \Log::error($exception);
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('toastr.something_went_wrong')]);
        }
    }

    public function render()
    {
        return view('livewire.front.subscribe.subscribe-live-wier');
    }
}
