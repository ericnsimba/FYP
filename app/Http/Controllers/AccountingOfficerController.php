<?php

namespace App\Http\Controllers;

use App\ImprestStaffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProgressStatus;
use App\Retirement;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AccountingOfficerController extends Controller
{

    public function accept($userid, $icode)
    {
        $status = 'accepted';
        DB::table('imprestStaff')->where('icode', '=', $icode)->update([
            'accepted_at' => Carbon::now()->format('Y-m-d')
        ]);

        Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewImprestNotify')->first()->markAsRead();

        // Notification::send( User::find($userid),new ProgressStatus($icode,$status));
        return redirect('home')->with('message', 'Imprest successful accepted');
    }
    public function decline($userid, $icode)
    {
        $status = 'declined';
        DB::table('imprestStaff')->where('icode', '=', $icode)->update([
            'accepted_at' => Carbon::now()->toDateTimeString()
        ]);
        Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewImprestNotify')->first()->markAsRead();

        return redirect('home')->with('message', 'Imprest request declined');
    }

    public function retirementAccept($rcode)
    {
        Retirement::find($rcode)->update([
            'accepted_at' => Carbon::now()->format('Y-m-d'),
            'status' => true
        ]);
        Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewRetirementNotify')->first()->markAsRead();

        return redirect('home')->with('message', 'Retirement Succesfully accepted');
    }

    public function retirementDecline($rcode)
    {
        Retirement::find($rcode)->update([
            'accepted_at' => Carbon::now()->format('Y-m-d'),
            'status' => false
        ]);
        Auth::user()->unreadNotifications->where('type', 'App\Notifications\NewRetirementNotify')->first()->markAsRead();

        return redirect('home')->with('message', 'Retirement Succesfully Declined');
    }
}
