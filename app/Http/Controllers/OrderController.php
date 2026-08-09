<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderStatusRequest;
use App\Http\Resources\OrderResource;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository
    ) {
    }

    public function index()
    {
        $orders = $this->orderRepository->getAll();

        return OrderResource::collection($orders);
    }

    public function store(StoreOrderRequest $request){

        $data = $request->validated();

        $data['user_id'] = $request->user()->id;

        $order = $this->orderRepository->create($data);

        return (new OrderResource($order))
        ->response()
        ->setStatusCode(201);
    }

    public function show(int $id)
    {
        $order = $this->orderRepository->findById($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found.'
            ], 404);
        }

        return new OrderResource($order);
    }

    public function updateStatus(
        UpdateOrderStatusRequest $request,
        int $id
    ): OrderResource|JsonResponse {
        $order = $this->orderRepository->findById($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found.'
            ], 404);
        }

        $order = $this->orderRepository->updateStatus(
            $order,
            $request->validated('status')
        );

        return new OrderResource($order);
    }

    public function destroy(int $id): JsonResponse
    {
        $order = $this->orderRepository->findById($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found.'
            ], 404);
        }

        $this->orderRepository->delete($order);

        return response()->json([
            'message' => 'Order deleted successfully.'
        ]);
    }
}