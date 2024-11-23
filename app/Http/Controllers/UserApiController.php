<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\jsonResponse;
use App\Http\Requests\RegiesterUserRequest;
use App\Models\UserApi;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\LoginUserApiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UserApiController extends Controller
{
    public function register(RegiesterUserRequest $request):jsonResponse
    {
        $data = $request->validated();

        if(UserApi::where("username",$data["username"])->count() == 1)
        {
            //harus menggunakan response()->json() karena versi 9
            throw new HttpResponseException(
                response()->json(["errors"=>[
                    "username"=>"username is already"
                ]
            ],500));
        }
        
        $user = new UserApi($data);
        $user->password = bcrypt($data["password"]);
        $user->save();

        $response = new RegisterResource($user);
        return $response->response()->setStatusCode(200);
    }

    public function login(LoginUserApiRequest $request)
    {
        $data = $request->validated();
        $user = UserApi::where("username",$data["username"])->first();
        $password = UserApi::where("password",bcrypt($data["password"]));

        if(!$user || !$password)
        {
            throw new HttpResponseException(response()->json([
                "errors"=>"username or password wrong"]),500);
        }elseif($user && $password)
        {
            DB::table("user_apis")->where("username",$data["username"])
            ->update(
                ["token"=>Str::uuid()->toString()]
            );
            return new RegisterResource($user);

        }

        // $user->token = Str::uuid()->toString();
        // $user->save();
        //versi 9 tidak mendukung


    }
}
