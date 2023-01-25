<?php

namespace App\Services\Order;

use App\Models\Order;

/**
 * Сервис для работы с заявками через БД
 */
class OrderDbService implements IOrderService
{
    /**
     * Сохраняем заявку в БД
     * @param array $order
     * @return void
     */
    public function create(array $order): void
    {
        Order::query()->create($order);
    }
}
