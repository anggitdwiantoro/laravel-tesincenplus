<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelUser;

class ControllerLogin extends Controller
{
    public function index(Request $request)
    {
        $passhash = app()->make('hash');
        $username = $request->input('username');
        $password = $request->input('password');
        $login = ModelUser::where('username', $username)->first();
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Your username or password incorrect!';
            return response($res);
        }else{
            if ($passhash->check($password, $login->password)) {
                $token_key = sha1(time());
                $create_token = ModelUser::where('id', $login->id)->update(['token_key' => $token_key]);
                if ($create_token) {
                    $res['success'] = true;
                    $res['token_key'] = $token_key;
                    $res['message'] = $login;
                    return response($res);
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'You username or password incorrect!';
                return response($res);
            }
        }
    }

    
}
