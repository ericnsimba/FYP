<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Attachments;
use App\ImprestStaffs;

class Alert extends Component
{

    // public $message = 'hi';

    // public $notifications = ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->message = $message;
        // $this->notifications =  $notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }

    public function notifications()
    {
        return Auth::user()->unReadNotifications;
    }
    public function imprests()
    {
       return  ImprestStaffs::whereNotNull('accountingOfficerStatus')->where('bursarStatus',null)->get();
    }

}
