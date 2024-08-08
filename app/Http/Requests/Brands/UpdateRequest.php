<?php

namespace App\Http\Requests\Brands;

class UpdateRequest extends StoreRequest
{
    protected function titleUniqueRule()
    {
        return parent::titleUniqueRule()->ignore($this->brand->id);
    }
}
