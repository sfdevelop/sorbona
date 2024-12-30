<?php

namespace App\Services\Password;

use App\Models\User;
use Illuminate\Support\Str;

class ResetPasswordFromMail {
    public function resetPassword(string $email): object
    {
        $user = User::where('email', $email)->first();
        $newPassword = $this->generatePassword();
        $user->password = $newPassword;
        $user->save();
        return (object) ['user' => $user, 'newPassword'=> $newPassword];
    }

    private function generatePassword(): string
    {
        return str_shuffle(Str::random(7) . Str::random(1, '!@#$%^&*'));
    }
}