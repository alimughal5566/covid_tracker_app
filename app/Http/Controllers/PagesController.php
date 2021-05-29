<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\QRScan;
use App\Models\ScanHistory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
public function checkinHistory(){
        $data=CheckIn::orderBy('id', 'desc')->paginate(10);
    return view('pages.checkin-history',compact('data'));
}
    public function getLocation(){
        $data=QRScan::orderBy('id', 'desc')->paginate(10);
        return view('pages.locations',compact('data'));
    }
    public function userLocations($id){

        $data=ScanHistory::where('location_id',$id)->paginate(10);

        return view('pages.scan-logs',compact('data'));

    }

}
