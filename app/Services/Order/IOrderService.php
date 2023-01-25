<?php

namespace App\Services\Order;

interface IOrderService
{
    public function create(array $order): void;
}
