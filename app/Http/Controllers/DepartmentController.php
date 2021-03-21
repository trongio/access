<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function delete( Request $request){
        $response = array(
            'status' => 'success',
            'delID' => $request->delID,
        );
        if ($response['delID'] && $response['status']=='success'){
            //Remove department from Personel who is in it
            DB::update('update personnel set departmentID = 1
                            where departmentID = ?', [$response['delID']]
                      );

            //Delete department from DB
            DB::delete('delete from departments where departmentID=?',[$response['delID']]);
            return response()->json("department " . $response['delID']. " Deleted successfully.");
        }
        return response()->json($response);
    }

    public function add( Request $request){
        $response = array(
            'status' => 'success',
            'depName' => $request->depName,
        );
        if ($response['depName'] && $response['status']=='success'){
            DB::table('departments')->insert([
                'departmentName' => $response['depName'],
            ]);
            return response()->json("department " . $response['depName']. " Added successfully.");
        }
        return response()->json($response);
    }
}
