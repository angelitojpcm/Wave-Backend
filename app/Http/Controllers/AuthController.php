<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $model;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->model = new User();
    }


    /**
     * Login User and return a JWT token
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $user = $this->model->where('email', $request->email)
            ->where('state', 1)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized', 'code' => 401], 401);
        }
        //Verificar el password,
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Unauthorized', 'code' => 401], 401);
        }

        //Generar el token
        $token = JWTAuth::fromUser($user);

        //Retornar el token
        return $this->respondWithToken($token, $user);
    }


    /**
     * Respone with token
     * @pararm string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respondWithToken($token, $user)
    {
        $payload = JWTAuth::setToken($token)->getPayload();
        $expires_in = $payload['exp'] - time();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expires_in,
            'user' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'photo' => $user->photo,
                'rol_id' => $user->rol_id,
                'last_device' => $user->last_device ? $user->last_device : null,
                'state' => $user->state,
            ],
        ]);
    }
}
