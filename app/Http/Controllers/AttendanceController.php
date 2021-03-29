<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function daily(Request $request){
        $response = array(
            'status' => 'success',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        );
//        $finalTable=[];
//        if ($response['status']=='success' && $response['startDate']<=$response['endDate']) {
//            $personnelID=DB::select('select p.personID from access.personnel p');
//            foreach ($personnelID as $personID){
//                $idarr=get_object_vars ($personID);
//                $k=0;
//                for ($i = strtotime($response['startDate']); $i <= strtotime($response['endDate']); $i+=60*60*24){
//                    $id=$idarr['personID'];

                    $dailyAttendance = DB::table(DB::raw ("
select l.row                                 as 'row',
       l.logID                               as 'logID',
       l.personID                            as 'personID',
       l.actionID                            as 'in',
       m.actionID                            as 'out',
       l.time                                as 'time_from',
       m.time                                as 'time_to',
       l.date                                as 'date',
       timestampdiff(minute, l.time, m.time) as 'minutes'
from (select row_number() over (order by l2.logID) as 'row', l2.logID, l2.personID, l2.actionID, l2.time, l2.date
      from access.logs l2
      where l2.personID = '50'
        and l2.date = '2021/01/13') l
         join (select row_number() over (order by l1.logID)     as 'row',
                      lead(l1.logID) over (order by l1.logID)    as 'logID',
                      lead(l1.personID) over (order by l1.logID) as 'personID',
                      lead(l1.actionID) over (order by l1.logID) as 'actionID',
                      lead(l1.time) over (order by l1.logID)     as 'time',
                      lead(l1.date) over (order by l1.logID)     as 'date'
               from access.logs l1
               where l1.personID = '50'
                 and l1.date = '2021/01/13') m on m.row = l.row
where l.actionID < m.actionID;") ->select())->get();
//
//                    $cnt=0;
//
//                    for ($i = 0; $i <count($dailyAttendance); $i++) {
//                        $cnt+=$dailyAttendance[$i]->minutes;
//                    }
//                    $finalTable[$k] = (object)[
//                        'Date'=>date("d-m-Y", $i),
//                        'workedTime'=>date("hh-n-ss", $cnt),
//                        'personID'=>$id,
//                    ];
//                    $k++;
//                }
//            }
            return response()->json($dailyAttendance);
        }


    public function monthly(Request $request){
        $response = array(
            'status' => 'success',
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        );
        if ($response['status']=='success' && $response['startDate']<=$response['endDate'] ){
            $monthlyAttendance="afcis logikeishen";
            return view('/attendance.monthlyAttendance', ['monthlyAttendance' => $monthlyAttendance]);
        }
        return response()->json("testing 3123412");
    }
}
