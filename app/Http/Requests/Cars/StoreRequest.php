<?php

namespace App\Http\Requests\Cars;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'brand_id'        => 'required|integer|exists:brands,id',
                'model'        => 'required|min:1|max:50',
                'price'        => ['required', 'integer', 'multiple_of:1000'],
                'transmission' => ['required', 'integer'],
                'vin' => ['required', 'min:4', $this->getVinUniqueRule()],
                'tags' => ['array'],
                'tags.*' => ['integer', 'exists:tags,id']
        ];
    }

    protected function getVinUniqueRule()
    {
        return Rule::unique(Car::class, 'vin');
    }
}
