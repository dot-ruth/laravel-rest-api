<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Category",
 *     title="Category",
 *     description="Represents a product category in the E-commerce system.",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *         description="Unique identifier for the category (auto-incrementing integer)"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         maxLength=255,
 *         example="Electronics",
 *         description="Category name"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="Electronic devices and accessories",
 *         description="Description of the category (optional)"
 *     ),
 * )
 */

class Category extends Model
{
    use HasFactory;
}
