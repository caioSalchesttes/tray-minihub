<?php

namespace App\Enums;

enum OfferEnum
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'paused';

    public static function fromValue(string $value) : string
    {
        return match ($value) {
            self::STATUS_ACTIVE => self::STATUS_ACTIVE,
            self::STATUS_INACTIVE => self::STATUS_INACTIVE,
        };
    }
}
