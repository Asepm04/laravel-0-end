<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Services\User\UserService;
use App\Rules\ValidatorRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;


class UserController extends Controller
{
    private UserService $UserService;

    public function __construct(UserService $userservice)
    {
        $this->UserService = $userservice;
    }
    public function login(Request $request): Response|RedirectResponse
    {
        // $data=
        // [
        //     "username" => $request->input('user'),
        //      "password" => $request->input('pw')
        // ];
        // $rules =
        // [
        //     "username"=> ["required"],
        //     "password"=>["required",new ValidatorRules()]
        // ];
        // $validator =Validator::make($data,$rules);
        // if($validator->fails())
        // {
        //     return response()->view(['user.login',"error"=>$validator->getMessageBag()]);
        // }

        $user = $request->input('user');
        $pw = $request->input('pw');

        if(empty($this->UserService->login($user,$pw)))
        {
            return response()->view('user.login',['error'=>'user or pw required']);
        }
            

            if($this->UserService->login($user,$pw))
            {
                $request->session()->put("user",$user);
            return redirect("/");
            }
            else{
            return response()->view('user.login',['error'=>"user or pw wrong"]);
        }

       
    }

    public function logout(Request $request):Response
    {
         $request->session()->forget("user");
        return response()->view('user.login');
    }
}