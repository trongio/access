<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function delete( Request $request){
        $response = array(
            'status' => 'success',
            'delID' => $request->delID,
        );
        if ($response['delID'] && $response['status']=='success'){
            //Remove shift from Personel who is in it
            DB::update('update personnel set shiftID = 1
                            where shiftID = ?', [$response['delID']]
                      );

            //Delete shift from DB
            DB::delete('delete from shifts where shiftID=?',[$response['delID']]);
            return response()->json("shift " . $response['delID']. " Deleted successfully.");
        }
        return response()->json($response);
    }

    public function add( Request $request){
        $response = array(
            'status' => 'success',
            'shiftName' => $request->shiftName,
            'shiftStart' => $request->shiftStart,
            'shiftEnd' => $request->shiftEnd
        );
        if ($response['shiftName'] && $response['status']=='success' && $response['shiftStart']<$response['shiftEnd'] ){
            DB::table('shifts')->insert([
                'shiftName' => $response['shiftName'],
                'shiftStart' => $response['shiftStart'],
                'shiftEnd' => $response['shiftEnd']
            ]);
            return response()->json("shift " . $response['shiftName']. " Added successfully.");
        }
        return response()->json($response);
    }
}
