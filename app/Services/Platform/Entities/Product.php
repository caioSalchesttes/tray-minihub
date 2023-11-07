<?php

namespace App\Services\Platform\Entities;
use App\Enums\ProductEnum;

class Product
{
    public readonly int $reference;
    public readonly string $title;
    public readonly string $status;
    public readonly float $price;
    public readonly float $promotional_price;
    public readonly \DateTime $promotion_starts_on;
    public readonly \DateTime $promotion_ends_on;
    public readonly int $quantity;

    public function __construct(array $data)
    {
        $this->reference = data_get($data, 'reference');
        $this->title = data_get($data, 'title');
        $this->status = ProductEnum::fromValue(data_get($data, 'status'));
        $this->price = (float)data_get($data, 'price');
        $this->promotional_price = (float)data_get($data, 'promotional_price');
        $this->promotion_starts_on = new \DateTime(data_get($data, 'promotion_starts_on'));
        $this->promotion_ends_on = new \DateTime(data_get($data, 'promotion_ends_on'));
        $this->quantity = (int)data_get($data, 'quantity');
    }
}
