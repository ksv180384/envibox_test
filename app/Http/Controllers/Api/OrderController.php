<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Добавление заявки
     * @param OrderRequest $request
     * @param OrderService $orderService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderRequest $request, OrderService $orderService): JsonResponse
    {
        try {
            $orderService->create($request->validated());
            return response()->json(['message' => 'Заявка успешно добавлена.']);
        } catch (\Exception $e){
            return response()->json(['message' => 'Ошибка при добавлении заявки.'], 404);
        }
    }
}
