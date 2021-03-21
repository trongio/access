<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function personnel()
    {
        $personnel = DB::select('
            select p.personid, p.personName, p.cardNum, d.departmentName, TIME_FORMAT(s.shiftStart,"%k:%i") as "shiftStart", TIME_FORMAT(s.shiftEnd,"%k:%i") as "shiftEnd" from personnel p
            inner join shifts s on p.shiftID = s.shiftID
            inner join departments d on p.departmentID = d.departmentID;
            ');
        return view('personnel',['personnel'=>$personnel]);
    }

    public function logs()
    {
        $logs = DB::select('
            select l.logID, p.PersonName, p.cardNum, a.actionName, TIME_FORMAT(l.time,"%k:%i") as "time", DATE_FORMAT(l.date, "%d/%m/%Y") as "date" from logs l
            inner join actions a on l.actionID = a.actionID
            inner join personnel p on l.personID = p.personID
            order by l.logID desc
            limit 1000;
            ');
        return view('logs',['logs'=>$logs]);
    }

    public function departments()
    {
        $departments = DB::select('select * from departments');
        return view('departments',['departments'=>$departments]);
    }

    public function shifts()
    {
        $shifts = DB::select('select shiftID,shiftName,TIME_FORMAT(shiftStart,"%k:%i") as "shiftStart",TIME_FORMAT(shiftEnd,"%k:%i") as "shiftEnd" from shifts');
        return view('shifts',['shifts'=>$shifts]);
    }

    public function attendance()
    {
        $attendance = DB::select('select * from attendance');
        return view('attendance',['attendance'=>$attendance]);
    }

}
