<?php

namespace App\Http\Requests\Livewier;

use App\Http\Requests\BaseRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UpdateCabinetInfoRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'phone' => 'required',
            'email' => ['required', 'email:rfc,dns', 'min:3', Rule::unique((new User)->getTable())->ignore(auth()->id())],
        ];
    }
}
