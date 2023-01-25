<?php

namespace App\Services;

use App\Services\Order\IOrderService;
use App\Services\Order\OrderServiceFactory;

class OrderService implements IOrderService
{
    // db, file
    const STORE = 'db';
    public IOrderService $service;

    public function __construct()
    {
        $this->service = (new OrderServiceFactory(self::STORE))->getOrderService();
    }

    public function create(array $orderData): void
    {
        $this->service->create($orderData);
    }
}
