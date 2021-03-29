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
        $finalTable=[];
        if ($response['status']=='success' && $response['startDate']<=$response['endDate']) {
            $personnelID=DB::select('select p.personID from access.personnel p');
            foreach ($personnelID as $personID){
                $idarr=get_object_vars ($personID);
                $k=0;
                for ($i = strtotime($response['startDate']); $i <= strtotime($response['endDate']); $i+=60*60*24){
                    $id=$idarr['personID'];

                    $dailyAttendance = DB::select('
                   select l.row                                 as "row",
                           l.logID                               as "logID",
                           l.personID                            as "personID",
                           l.actionID                            as "in",
                           m.actionID                            as "out",
                           l.time                                as "time_from",
                           m.time                                as "time_to",
                           l.date                                as "date",
                           timestampdiff(minute, l.time, m.time) as "minutes"
                    from (select row_number() over (order by l.logID) as "row", l.logID, l.personID, l.actionID, l.time, l.date
                          from access.logs l
                          where l.personID = ?
                            and l.date = ?) l
                             join (select row_number() over (order by l.logID)     as "row",
                                          lead(l.logID) over (order by l.logID)    as "logID",
                                          lead(l.personID) over (order by l.logID) as "personID",
                                          lead(l.actionID) over (order by l.logID) as "actionID",
                                          lead(l.time) over (order by l.logID)     as "time",
                                          lead(l.date) over (order by l.logID)     as "date"
                                   from access.logs l
                                   where l.personID = ?
                                     and l.date = ?) m on m.row = l.row
                    where l.actionID < m.actionID;'
                        ,["'".$id."'","'".date("Y-m-d", $i)."'",$id,date("Y-m-d", $i)]);

                    $cnt=0;

                    for ($i = 0; $i <count($dailyAttendance); $i++) {
                        $cnt+=$dailyAttendance[$i]->minutes;
                    }
                    $finalTable[$k] = (object)[
                        'Date'=>date("d-m-Y", $i),
                        'workedTime'=>date("hh-n-ss", $cnt),
                        'personID'=>$id,
                    ];
                    $k++;
                }
            }
            return response()->json($finalTable);
        }
        return response()->json($response);
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
