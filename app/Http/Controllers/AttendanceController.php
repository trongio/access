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
        if(!DB::select('select * from logs a where a.date >= ? and a.date <= ?;', [$response['startDate'], $response['endDate']])){
            return null;
        }
        $finalTable=[];
        if ($response['status']=='success' && $response['startDate']<=$response['endDate']) {
            $personnelID=DB::select('select p.personID, p.personName, s.workTime from access.personnel p join shifts s on p.shiftID = s.shiftID');
            $k=0;
            foreach ($personnelID as $personID){
                $idarr=get_object_vars ($personID);
                for ($i = strtotime($response['startDate']); $i <= strtotime($response['endDate']); $i+=60*60*24){
                    $id=$idarr['personID'];
                    $person=$idarr['personName'];
                    $dailyAttendance = DB::select( "
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
                          where l2.personID = ?
                            and l2.date = ?) l
                             join (select row_number() over (order by l1.logID)     as 'row',
                                          lead(l1.logID) over (order by l1.logID)    as 'logID',
                                          lead(l1.personID) over (order by l1.logID) as 'personID',
                                          lead(l1.actionID) over (order by l1.logID) as 'actionID',
                                          lead(l1.time) over (order by l1.logID)     as 'time',
                                          lead(l1.date) over (order by l1.logID)     as 'date'
                                   from access.logs l1
                                   where l1.personID = ?
                                     and l1.date = ?) m on m.row = l.row
                                        where l.actionID < m.actionID;", [$id, date('Y-m-d', $i), $id, date('Y-m-d', $i)]);

                    $cnt=0;

                    for ($j = 0; $j <count($dailyAttendance); $j++) {
                        $cnt+=$dailyAttendance[$j]->minutes;
                    }

                    $workHours=$idarr['workTime'];
                    $hours = abs(intdiv($cnt, 60)).'hr'. abs($cnt % 60).'mm';
                    $intHours = abs((intdiv($cnt, 60)) . '.' . abs($cnt % 60));
                    $overtime = $intHours - $workHours;

                    $finalTable[$k] = (object)[
                        'personName'=>$person,
                        'personID'=>$id,
                        'workedTime'=>$hours,
                        'overtime' => `'`.$overtime.`'`,
                        'date'=>date("d-m-Y", $i)
                    ];
                    $k++;
                }
            }
        }
        $cont=new TableController();
        return $cont->dailyAttendance($finalTable);
        /*return view('/attendance.dailyAttendance', ['dailyAttendance' => $finalTable]);*/
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
