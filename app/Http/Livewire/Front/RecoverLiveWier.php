<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use App\Services\Password\ResetPasswordFromMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RecoverLiveWier extends Component
{
    public string $emailPhone = '';

    protected array $rules = [
        'emailPhone' => 'required',
    ];

    public function recover(): void
    {
        $this->validate();

        $action = match (true) {
            $this->isEmail() => 'handleEmailRecovery',
            $this->isPhoneNumber() => 'handlePhoneRecovery',
            default => 'handleInvalidInput',
        };

        $this->{$action}();
    }

    private function isEmail(): bool
    {
        return filter_var($this->emailPhone, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isPhoneNumber(): bool
    {
        return preg_match('/^\+[0-9]{10,14}$/', $this->emailPhone) === 1;
    }

    private function handleEmailRecovery(): void
    {
        $validator = Validator::make(['email' => $this->emailPhone], [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            $this->showAlert('error', __('front.email_not_found'));

            return;
        }

        $user = app()
            ->make(ResetPasswordFromMail::class)
            ->resetPassword($this->emailPhone);

        $this->sendPasswordResetEmail($user->user, $user->newPassword);
        $this->showAlert('success', __('front.password_reset_success'));

        $this->reset(['emailPhone']);
    }

    private function handlePhoneRecovery(): void
    {
        $this->showAlert('info', __('front.phone_recovery_not_implemented'));
    }

    private function handleInvalidInput(): void
    {
        $this->showAlert('error', __('front.phone_error'));
    }

    private function sendPasswordResetEmail(User $user, string $newPassword): void
    {
        $emailContent = __('front.password_reset_email', [
            'email' => $user->email,
            'password' => $newPassword,
        ]);

        Mail::raw($emailContent, function ($message) use ($user) {
            $message
                ->to($user->email)
                ->subject(__('front.password_reset_subject'));
        });
    }

    private function showAlert(string $type, string $message): void
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('livewire.front.recover-live-wier');
    }
}
