<?php

namespace App\Http\Livewire\Front\Contacts;

use App\Http\Requests\Livewier\CreateFeedBeackRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FeedBackLiveWier extends Component
{
    public string $name = '';

    public string $email = '';

    public string $text = '';

    /**
     * @return array
     */
    protected function rules(): array
    {
        return (new CreateFeedBeackRequest)->rules();
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
    public function mount(): void
    {
        if (\Auth::check()) {
            $this->name = \Auth::user()->name;
            $this->email = \Auth::user()->email;
        }
    }

    /**
     * @return void
     */
    public function createSender(): void
    {
        $data = $this->validate();

        try {
            \App\Models\Feedback::create($data);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('toastr.feedBack_success')]);

            $this->resetInput();
        } catch (\Throwable $e) {
            \Log::warning($e);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.subscribe_error')]);
        }
    }

    /**
     * @return void
     */
    public function resetInput(): void
    {
        if (\Auth::check()) {
            $this->reset([
                'text',
            ]);
        } else {
            $this->reset([
                'email',
                'name',
                'text',
            ]);
        }
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.front.contacts.feed-back-live-wier');
    }
}
