<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CryptUnCryptData {
    public function cryptData(string $data): string
    {
        return Crypt::encryptString($data);
    }

    public function decryptData(string $encryptedData): string
    {
        return Crypt::decryptString($encryptedData);
    }

    public function saveEncryptedDataToUser(string $data): void
    {
        $encryptedData = $this->cryptData($data);

        $user = Auth::user();
        $user->crypt = $encryptedData;
        $user->save();
    }
}