<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function delete( Request $request){
        $response = array(
            'status' => 'success',
            'DelID' => $request->DelID,
        );
        if ($response['DelID'] && $response['status']=='success'){
            //Remove department from Personel who is in it
            DB::update('update personnel set departmentID = 1
                            where departmentID = ?', [$response['DelID']]
                      );

            //Delete department from DB
            DB::delete('delete from departments where departmentID=?',[$response['DelID']]);
            return response()->json("department " . $response['DelID']. " Deleted successfully.");
        }
        return response()->json($response);
    }
}
