<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function __construct(
        private FoodRepositoryInterface $foodRepository
    ) {
    }

    public function index()
    {
        $foods = $this->foodRepository->getAll();

        return FoodResource::collection($foods);
    }

    public function store(StoreFoodRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('foods', 'public');
        }

        $food = $this->foodRepository->create($data);

        return (new FoodResource($food))
            ->response()
            ->setStatusCode(201);
    }

    public function show(int $id)
    {
        $food = $this->foodRepository->findById($id);

        if (!$food) {
            return response()->json([
                'message' => 'Food not found.'
            ], 404);
        }

        return new FoodResource($food);
    }

    public function update(
    UpdateFoodRequest $request,
    int $id
    ) {
        $food = $this->foodRepository->findById($id);

        if (!$food) {
            return response()->json([
                'message' => 'Food not found.'
            ], 404);
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            $data['image'] = $request->file('image')->store('foods', 'public');
        }

        $food = $this->foodRepository->update($food, $data);

        return new FoodResource($food);
    }   

    public function destroy(int $id): JsonResponse
    {
        $food = $this->foodRepository->findById($id);

        if (!$food) {
            return response()->json([
                'message' => 'Food not found.'
            ], 404);
        }

        $this->foodRepository->delete($food);

        return response()->json([
            'message' => 'Food deleted successfully.'
        ]);
    }
}