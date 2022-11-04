<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as Session;

class AuthController extends Controller
{
        public function register(Request $request)
        { 
            $validator = Validator::make($request->all(), [
            'email' => 'required|max:30|min:5',
            'password' => 'required|max:20|min:6'
            ]); 
        
            if($validator->fails()){
                return $this->sendError('Ошибка валидации', $validator->errors());
            }
        
            $user = User::where('email', $request->email)->first();
            
            if ($user) {
                return $this->sendError('Данный email уже зарегистрирован', '');
            }
        
            $input = $request->all(); 
            $input['password'] = bcrypt(Str::random(8));
            $input['role_id'] = 3;
            $user = User::create($input);

            $success['email'] =  $user->email;   
        
            return $this->sendResponse($success, 'Пользователь уcпешно зарегистрирован');
            // dd($request->all());
        }

        public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Ошибка валидации', $validator->errors());
            }

            $user = User::where('email', $request->email)->first();
    
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return $this->sendError('Ошибка входа', ['error'=>'Unauthorised']);
            }

            $success['token'] =  $user->createToken('MyAuthApp', ['test10'])->plainTextToken; 
            $success['name'] =  $user->name;
            $success['user_id'] = $user->id;

            return $this->sendResponse($success, 'Выполнен вход');

        }
}
