<?php

namespace App\Services\Order;

use Illuminate\Support\Facades\Storage;

/**
 * Сервис для работы с заявками через файлы
 */
class OrderFileService implements IOrderService
{
    /**
     * Сохраняем данные заявки в файл
     * @param $order
     * @return void
     */
    public function create(array $order): void
    {
        $phoneNum = preg_replace("/[^,.0-9]/", '', $order['phone']);
        $fileName = 'order_' . now()->format('Y_m_d_H_i_s') . '_' . $phoneNum . '_'. '.txt';

        $content = 'Имя: ' . $order['name'] . "\n" .
                   'Телефон: ' .  $order['phone'] . "\n" .
                   'Сообщение: ' . "\n" .
                    $order['message'];

        Storage::disk('local')->put('orders/' . $fileName, $content);
    }
}
