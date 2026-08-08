<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        return CategoryResource::collection($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryRepository->create(
            $request->validated()
        );

        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(201);
    }

    public function show(int $id)
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        return new CategoryResource($category);
    }

    public function update(
        UpdateCategoryRequest $request,
        int $id
    ) {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        $category = $this->categoryRepository->update(
            $category,
            $request->validated()
        );

        return new CategoryResource($category);
    }

    public function destroy(int $id): JsonResponse
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }

        $this->categoryRepository->delete($category);

        return response()->json([
            'message' => 'Category deleted successfully.'
        ]);
    }
}