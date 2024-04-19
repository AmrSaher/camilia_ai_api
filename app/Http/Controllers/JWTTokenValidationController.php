<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JWTTokenValidationController extends Controller
{
    public function validateToken(Request $request, $token)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $isTokenValid = JWTAuth::check($token);
            
            if ($isTokenValid) {
                return response()->json([
                    'decoded' => true,
                ], 201);
            } else {
                throw JWTException;
            }
        
        } catch (JWTException $e) {
            return response()->json([
                'decoded' => false,
            ], 401);
        }
    }
}
