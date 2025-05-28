<?php

namespace App\Http\Requests\Livewier;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    protected string $delivery;
    protected string $payment;

    public function setDeliveryAndPayment($delivery, $payment): static
    {
        $this->delivery = $delivery;
        $this->payment = $payment;
        return $this;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'phone' => 'required|string',
            'email' => 'required|string|min:3|email:rfc,dns',
            'delivery' => 'required|string',
            'payment' => 'required|string',
            'comment' => 'nullable|string',
            'total' => 'required|string',
        ];

        // Додаємо правила валідації в залежності від вибраного методу доставки
        if ($this->delivery == 'deliveryMethodUp') {
            $rules = array_merge($rules, [
                'region' => 'required|string|min:3',
                'locality' => 'required|string|min:3',
                'index' => 'required|string',
            ]);
        }

        if ($this->delivery == 'deliveryMethodNp') {
            $rules = array_merge($rules, [
                'selectedNpCity' => 'required|string',
                'selectedNpDepot' => 'required|string',
            ]);
        }

        if ($this->payment == 'paymentMethodBank') {
            $rules = array_merge($rules, [
                'companyName' => 'required|string|min:3',
                'inn' => 'required|string|min:3',
                'edrpou' => 'required|string',
            ]);
        }

        return $rules;
    }

    public function authorize(): bool
    {
        return true;
    }
}
