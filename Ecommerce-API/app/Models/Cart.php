<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Cart",  
 *     title="Cart Item",
 *     description="Represents an item in the user's shopping cart.",
 *     @OA\Property(property="product_id", type="integer", example=1, description="ID of the product in the cart"),
 *     @OA\Property(property="quantity", type="integer", minimum=1, example=2, description="Quantity of the product in the cart (must be at least 1)"),
 * )
 */

class Cart extends Model
{
    use HasFactory;
}
