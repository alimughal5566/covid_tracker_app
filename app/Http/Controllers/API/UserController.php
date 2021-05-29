<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email',
            'contact'=>'required',
//            'password' => 'required',
//            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
//        $input['password'] = bcrypt($input['password']);
//        $input['contact'] = $input['contact'];
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
//        dd($request);

//        $success['name'] =  $user->name;
//        $success['contact'] =  $user->contact;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
//        dd($request);
        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email',
            'contact'=>'required',
            'country'=>'required',
//            'password' => 'required',
//            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = User::where('contact',$request->contact)->first();
        if($user){
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            $input = $request->all();
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success'=>$success], $this-> successStatus);
        }
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
