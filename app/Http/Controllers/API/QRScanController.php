<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\QRScan;
use App\Models\ScanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRScanController extends Controller
{
    public $successStatus = 200;

    public function store(Request $request){

        $user = Auth::id();
        $scan_id=QRScan::where('scan_id',$request['scan_id'])->first();
        if ($scan_id){
            $data=ScanHistory::create([
                'location_id'=>$scan_id['id'],
                'user_id'=>$user,
                 ]);
        }
        else
            {
            $location=QRScan::create([
                'scan_id'=>$request['scan_id'],
                'location_name'=>$request['location_name'],
                'user_id'=>$user,]);
                $data=ScanHistory::create([
                    'location_id'=>$location['id'],
                    'user_id'=>$user,
                ]);
            }


        if($data){
            return response()->json('success', $this-> successStatus);
        }
    }

}
