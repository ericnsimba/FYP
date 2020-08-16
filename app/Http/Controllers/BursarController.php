<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BursarController extends Controller
{
    public function accept($icode)
    {
        DB::table('imprestStaff')->where('icode', '=', $icode)->update([
               'bursarStatus'=>true
        ]);
        return redirect('home')->with('message', 'Imprest successful issued');
    }

    public function decline($icode)
    {
        DB::table('imprestStaff')->where('icode', '=', $icode)->update([
            'bursarStatus'=>false
     ]);
     return redirect('home')->with('message', 'Imprest successful declined');
    }
}
