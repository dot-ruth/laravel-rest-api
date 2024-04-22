<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
 * @OA\Post(
 *      path="/api/auth/login",
 *      operationId="login",
 *      tags={"Authentication"},
 *      summary="Authenticate user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"email", "password","phone_number"},
 *              @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *              @OA\Property(property="password", type="string", example="password123"),
 *              @OA\Property(property="phone_number",type="string" ,example="+251912345678")
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="access_token", type="string"),
 *              @OA\Property(property="token_type", type="string", example="bearer"),
 *              @OA\Property(property="expires_at", type="string", format="date-time")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *      )
 * )
 */

 public function login(LoginRequest $request)
 {
     $credentials = $request->only('email', 'phone_number', 'password');

     if (Auth::attempt($credentials)) {
         $user = Auth::user();
         $token = $user->createToken('AuthToken')->accessToken;

         return response()->json([
             'access_token' => $token,
             'token_type' => 'bearer',
             'expires_at' => now()->addDay()->toDateTimeString()
         ]);
     }

     return response()->json(['error' => 'Unauthorized'], 401);
 }

 /**
  * @OA\Post(
  *      path="/api/auth/register",
  *      operationId="register",
  *      tags={"Authentication"},
  *      summary="Register a new user",
  *      @OA\RequestBody(
  *          required=true,
  *          @OA\JsonContent(
  *              required={"name", "email", "phone_number", "password"},
  *              @OA\Property(property="name", type="string", example="John Doe"),
  *              @OA\Property(property="email", type="string", format="email", example="user@example.com"),
  *              @OA\Property(property="phone_number", type="string", example="1234567890"),
  *              @OA\Property(property="password", type="string", example="password123")
  *          )
  *      ),
  *      @OA\Response(
  *          response=201,
  *          description="User registered successfully",
  *      ),
  *      @OA\Response(
  *          response=422,
  *          description="Validation error",
  *      )
  * )
  */
 public function register(RegisterRequest $request)
 {
     $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'phone_number' => $request->phone_number,
         'password' => bcrypt($request->password),
     ]);

     return response()->json(['message' => 'User registered successfully'], 201);
 }
}
