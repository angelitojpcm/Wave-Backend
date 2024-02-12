<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Auth extends Controller implements JWTSubject
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
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = $this->model->where('email', $request->email)
                            ->where('state', 1)
                            ->first()
                            ->toArray();

        //Verificar el password
        if (!Hash::check($request->password, $data->password, [])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */

    public function getJWTCustomClaims()
    {
        return [];
    }
}
