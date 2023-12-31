<?php

namespace App\Enums;

enum ProductEnum
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    public static function fromValue(string $value) : string
    {
        return match ($value) {
            self::STATUS_ACTIVE => self::STATUS_ACTIVE,
            self::STATUS_INACTIVE => self::STATUS_INACTIVE,
        };
    }

    public static function toOfferEnum(string $value) : string
    {
        return match ($value) {
            self::STATUS_ACTIVE => OfferEnum::STATUS_ACTIVE,
            self::STATUS_INACTIVE => OfferEnum::STATUS_INACTIVE,
        };
    }
}
