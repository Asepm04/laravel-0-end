<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Services\User\UserService;

class UserController extends Controller
{
    private UserService $UserService;

    public function __construct(UserService $userservice)
    {
        $this->UserService = $userservice;
    }
    public function login(Request $request): Response|RedirectResponse
    {
        $user = $request->input('user');
        $pw = $request->input('pw');

        
        if($this->UserService->login($user,$pw))
        {
            $request->session()->put("user",$user);
            return redirect('/');
        }else{
            return response()->view('user.login',['error'=>"user or pw wrong"]);
        }

        if(empty($this->UserService->login($user,$pw)))
        {
            return response()->view('user.login',['error'=>'user or pw required']);
        }
    }

    public function logout(Request $request):Response
    {
         $request->session()->forget("user");
        return response()->view('user.login');
    }
}