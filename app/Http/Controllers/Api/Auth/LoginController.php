<?php

namespace App\Http\Controllers\Api\Auth;

class LoginController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Не удалось найти пользователя с такими данными'], 401);
        }

        return $this->respondWithToken($token);
    }
}
