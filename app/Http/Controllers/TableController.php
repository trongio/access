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
        $logs = DB::select('select * from logs');
        return view('logs',['logs'=>$logs]);
    }

    public function departament()
    {
        $departament = DB::select('select * from departament');
        return view('departament',['departament'=>$departament]);
    }

    public function attendance()
    {
        $attendance = DB::select('select * from attendance');
        return view('attendance',['attendance'=>$attendance]);
    }

}
