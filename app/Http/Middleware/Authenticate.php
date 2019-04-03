<?php

namespace App\Http\Middleware;

use Closure;
use App\ModelUser;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        
        $token = $request->header('Authorization');
        if(empty($token)){
            return response()->json([
                'error' => 'Authorization Header kosong. Anda harus login untuk mendapatkan token!'
            ]);
        }

        
        $pecah_token = explode(" ", $token);
        if(count($pecah_token) <> 2){
            return response()->json([
                'error' => 'Format Authorization salah'
            ]);
        }

        if(trim($pecah_token[0]) <> 'Bearer'){
            return response()->json([
                'error' => 'Authorization header Harus Bearer'
            ]);
        }


        $access_token = trim($pecah_token[1]);

        
        $cek = ModelUser::where('token_key', $access_token)->first();
        if(empty($cek)){
            return response()->json([
                'error' => 'Forbidden : Invalid access token'
            ]);
        }

        return $next($request);
    }
}
