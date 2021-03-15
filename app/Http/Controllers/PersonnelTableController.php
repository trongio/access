<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PersonnelTableController extends Controller
{
    public function index()
    {
        $personnel = DB::select('select * from personnel');
        return view('personnel',['personnel'=>$personnel]);
    }

}
