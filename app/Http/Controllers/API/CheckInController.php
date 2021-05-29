<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    public $successStatus = 200;

    public function storeCheckin(Request $request){
        $user_id=Auth::id();
        $data=CheckIn::create([
            'user_id'=>$user_id,
            'date'=>$request['date'],
            'gender'=>$request['gender'],
            'age_range'=>$request['age_range'],
            'country'=>$request['country'],
            'no_sym'=>$request['no_sym'],
            'is_covid'=>$request['is_covid'],
        ]);
        if($data){
            return response()->json('success', $this-> successStatus);
        }
    }


    public function viewCheckin(){
       $user_id=Auth::id();
//       dd($user_id);
        $data=CheckIn::where('user_id',$user_id)->get();
//        dd($data);
        if($data){
            return response()->json( ['status'=>'success','data'=>$data], $this-> successStatus);
        }
    }
    public function todayCheckins(){

        $data =CheckIn::whereDate('created_at', Carbon::today())->count();

        if($data){
            return response()->json( ['status'=>'success','data'=>$data], $this-> successStatus);
        }



    }
}
