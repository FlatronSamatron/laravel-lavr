<?php

namespace App\Enums\Cars;

enum Status: int
{
    case DRAFT = 0;
    case ACTIVE = 5;
    case SOLD = 10;
    case CANCELED = 15;

    public function text()
    {
        return match($this) {
            self::DRAFT => 'draft',
            self::ACTIVE => 'active',
            self::SOLD => 'sold',
            self::CANCELED => 'cancel',
        };
    }
}