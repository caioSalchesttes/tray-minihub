<?php

namespace App\Services\Platform\Endpoints;

trait HasProducts
{
    public function products() : Products
    {
        return new Products();
    }
}
