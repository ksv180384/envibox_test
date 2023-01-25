<?php

namespace App\Services\Order;

class OrderServiceFactory
{
    private string $service;

    public function __construct(string $service)
    {
        $this->service = $service;
    }

    public function getOrderService(): IOrderService
    {
        switch ($this->service){
            case 'db':
                return new OrderDbService();
            case 'file':
                return new OrderFileService();
        }

        return new OrderDbService();
    }
}
