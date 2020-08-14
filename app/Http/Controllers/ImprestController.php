<?php

namespace App\Http\Controllers;

use App\Attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Imprest;
use App\User;
use App\Expenditures;
use App\Notifications\NewImprestNotify;
use Illuminate\Support\Facades\Auth;
use App\Retirement;
use Illuminate\Support\Facades\Notification;
use App\ImprestStaffs;
use App\Notifications\ProgressStatus;
use Illuminate\Support\Facades\Storage;


class ImprestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Attachments::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $auth = Auth::user();

        return view('imprest-form',(compact('auth')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {



        $request->validate([

            'purpose' => 'required',
            'amount' => 'required| numeric',
            'attachment'=>'required'
        ]);


        Imprest::create($request->all());
        $path =$request->attachment->store('imprests');
        // $contents = Storage::get($path);
        // return  $contents;


        $latestImprest =Imprest::latest()->first();
        DB::table('imprestStaff')->insert([[
            'icode' => $latestImprest->icode,
            'id' => Auth::user()->id,
            'amount_retired' => 0,
            'cleared' => false,
            'attachmentPath'=>$path
        ]]);

        //send new imprest notification to accounting officer
        $users = User::role('accountingOfficer')->get();

        Notification::send($users,new NewImprestNotify($latestImprest,Auth::user()->name));

        return redirect('uirrm')->with('message', 'IMPREST SUCCESSFULLY SENT');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $imprest = Imprest::find($id);
        // dd($id);
        $staff = Imprest::imprestStaff($id);

        $boolean = true ;
        return view('home',compact('imprest','staff','boolean'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function history()
    {


        $imprests = collect(new Imprest());
        $retirements = array();
        $status = array();
        $accepted_at = array();

        $icodes = ImprestStaffs::where('id',Auth::user()->id)->orderBy('accepted_at')->get();
        $retirements = Retirement::where('id',Auth::user()->id)->get();

          if(count($icodes)>0){
        foreach ( $icodes as $icode) {
            $imprests[] = Imprest::find($icode->icode);
            $status[] = $icode->cleared;
            $accepted_at[] = $icode->accepted_at;

        }}
            // return $retirements;
        return view('history',compact('imprests','status','retirements','accepted_at'));

    }

}
