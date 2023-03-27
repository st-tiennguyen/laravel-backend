<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUuidMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // //$body = $request->all();

        // $result = json_decode($request->getContent(), true);

        // if (!empty($body['uuid']) && preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){3}-[a-f\d]{12}$/i', $body['uuid'])) {
        //     echo($body['uuid']);
        //     return $next($request);
        // }
        // return response()->json(['error' => 'Invalid UUID.'], 401);
        // $request->request->add(['test', '123']);

        // // $key => value
        // $request->request->add(['test' => '123']); 
        $data = $request->all();
        dd($data);
        
        if (!isset($data['uuid'])) {
            return response()->json(['message' => 'Missing UUID'], 401);
        }

        $user = User::where('uuid', $data['uuid'])->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid UUID'], 401);
        }

        return $next($request);
    }
}
