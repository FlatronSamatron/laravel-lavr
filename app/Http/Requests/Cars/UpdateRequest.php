<?php

namespace App\Http\Requests\Cars;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    protected function getVinUniqueRule()
    {
        return parent::getVinUniqueRule()->ignore($this->car->id);
    }
}
