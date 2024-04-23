<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/category",
     *      operationId="getCategory",
     *      tags={"Category"},
     *      summary="Get a list of all category",
     *      description="Returns a list of all category.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Category")
     *          )
     *      )
     * )
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * @OA\Post(
     *      path="/api/category",
     *      operationId="createCategory",
     *      tags={"Category"},
     *      summary="Create a new Category",
     *      description="Create a new Category.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Category")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Category")
     *      )
     * )
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/category/{id}",
     *      operationId="getCategoryById",
     *      tags={"Category"},
     *      summary="Get a Category by ID",
     *      description="Returns a Category by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Category")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category not found"
     *      )
     * )
     */
    public function show(Category $Category)
    {
        return $Category;
    }

    /**
     * @OA\Put(
     *      path="/api/category/{id}",
     *      operationId="updateCategory",
     *      tags={"Category"},
     *      summary="Update a Category",
     *      description="Update a Category by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Category")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Category")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Category not found"
     *      )
     * )
     */
    public function update(CategoryRequest $request, Category $Category)
    {
        return $Category->update($request->all());
    }

    /**
     * @OA\Delete(
     *      path="/api/category/{id}",
     *      operationId="deleteCategory",
     *      tags={"Category"},
     *      summary="Delete a Category",
     *      description="Delete a Category by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Category not found"
     *      )
     * )
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return " Category Deleted Successfully ";
    }
}
