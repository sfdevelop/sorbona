<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Traits\CartTrait;
use App\Repository\Setting\SettingRepositoryInterface;
use App\ViewModels\ContactsViewModel;

class ContactsController extends Controller
{
    use CartTrait;

    public function __construct(
        public SettingRepositoryInterface $settingsRepository,
    ) {}

    /**
     * @return ContactsViewModel
     */
    public function __invoke(): ContactsViewModel
    {
        return (new ContactsViewModel($this->settingsRepository))->view('front.contacts.contacts');
    }
}
