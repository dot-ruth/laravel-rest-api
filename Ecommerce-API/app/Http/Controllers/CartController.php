<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/cart",
     *      operationId="getCarts",
     *      tags={"Carts"},
     *      summary="Get a list of all carts",
     *      description="Returns a list of all carts.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Cart")
     *          )
     *      )
     * )
     */
    public function index()
    {
        return Cart::all();
    }

    /**
     * @OA\Post(
     *      path="/api/cart",
     *      operationId="createCart",
     *      tags={"Carts"},
     *      summary="Create a new cart",
     *      description="Create a new cart.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Cart")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Cart")
     *      )
     * )
     */
    public function store(CartRequest $request)
    {
        Cart::create($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/cart/{id}",
     *      operationId="getCartById",
     *      tags={"Carts"},
     *      summary="Get a cart by ID",
     *      description="Returns a cart by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Cart")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Cart not found"
     *      )
     * )
     */
    public function show(Cart $cart)
    {
        return $cart;
    }

    /**
     * @OA\Put(
     *      path="/api/cart/{id}",
     *      operationId="updateCart",
     *      tags={"Carts"},
     *      summary="Update a cart",
     *      description="Update a cart by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Cart")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Cart")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Cart not found"
     *      )
     * )
     */
    public function update(CartRequest $request, Cart $cart)
    {
        return $cart->update($request->all());
    }

    /**
     * @OA\Delete(
     *      path="/api/cart/{id}",
     *      operationId="deleteCart",
     *      tags={"Carts"},
     *      summary="Delete a cart",
     *      description="Delete a cart by its ID.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cart ID",
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
     *          description="Cart not found"
     *      )
     * )
     */
    public function destroy(Cart $cart)
    {
        $media->delete();
        return 'Media successfully deleted.';
    }
}
