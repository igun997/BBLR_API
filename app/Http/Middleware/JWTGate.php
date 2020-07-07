<?php

namespace App\Http\Middleware;

use App\BBLR\User;
use Closure;
use Firebase\JWT\JWT;

class JWTGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$level)
    {
        $pub = file_get_contents(base_path()."/main.key.pub");
        $is_header = $request->hasHeader("Authorization");
        if ($is_header){
            $token = $request->header("Authorization");
            try {
                $decode = JWT::decode($token,$pub,["ES256","RS256","RS384","RS512"]);
                if (time() >= $decode->expired){
                    return response()->json(["code"=>400,"msg"=>"Token Expired"],200);
                }

                $user = User::where(["id"=>$decode->id]);
                if ($user->count() == 0){
                    return response()->json(["code"=>400,"msg"=>"User Does'nt Exists"],200);
                }else{
                    if (trim($user->first()->token) !== trim($token)){
                        return response()->json(["code"=>400,"msg"=>"Token Invalid"],200);
                    }
                }

                if ($level != $decode->level){
                    return response()->json(["code"=>400,"msg"=>"Invalid Access Right"],200);
                }

                $request->attributes->add(["info"=>$decode]);
                return $next($request);
            }catch (\InvalidArgumentException $e){
                return  response()->json(["code"=>400,"msg"=>$e],200);
            }
        }else{
            return  response()->json(["code"=>400,"msg"=>"Bad Request"],200);
        }
    }
}
