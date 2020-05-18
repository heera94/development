<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Response\ResponseController;

class LoginController extends Controller
{
    public function login(Login $request)
    {
        $credentials = request(['email', 'password']);
        if(! Auth::guard()->attempt($credentials)){

            return ResponseController::sendResponse(false, ['message' => 'These credentials do not match our records.'], 404);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->scopes = [
            'ip'                => request()->ip(),
            'clientDetails'     => $_SERVER['HTTP_USER_AGENT'],
            'registrationKey'   => 'HNFGSN/785142\JHSNB/85251SD',
        ];
        $token->save();

        $responseData = [
            'access_token'  => $tokenResult->accessToken,
            'token_type'    => 'Bearer',
            // 'expires_at'    => $tokenResult->token,
            'user' => [
                'id' => $user->id,
                'firstname' => $user->name,
                'email' => $user->email,
                'role'  => $user->roles
            ]
        ];
        return ResponseController::sendResponse(true, [
            'result' => $responseData,
            'message' => 'Successfully login'
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status'  => 1,
            'message' => 'Successfully logged out'
        ]);
    }
}
