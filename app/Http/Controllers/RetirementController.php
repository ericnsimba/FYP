<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  App\Retirement;
use  App\Attachments;
use App\Imprest;
use App\ImprestStaffs;
use App\Notifications\NewRetirementNotify;
use App\User;
use Illuminate\Support\Facades\Notification;


class RetirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->has('icode')){
           $icodes[] = $request->icode ;
        }
        else{
        $userid = Auth::user()->id;
        $icodes = DB::table('imprestStaff')->where('id','=',$userid)->where('cleared',false)->pluck('icode') ;}
        return view('retirement_form')->with('icodes',$icodes);
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
            'icode' => 'required|numeric',
            'details' => 'required|string',
            'receiptFile' => 'required|max:2048',
            'receiptNumber' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        Retirement::create([
            'id'=>Auth::user()->id,
            'icode' => $request->icode,
            'totalAmount' => $request->amount      //to be renamed to total amount of all attachments
        ]);

       DB::table('imprestStaff')->where('icode', '=', $request->icode)->increment('amount_retired', $request->amount);

        $amount = Imprest::find($request->icode)->amount;   //imprest amount
        $retiredAmount =  ImprestStaffs::find($request->icode)->amount_retired;  //retired amount

        if ($retiredAmount >=  $amount) {
            DB::table('imprestStaff')->where('icode', '=', $request->icode)->update([
                'cleared' => true
            ]);
        }

        //save attachments

        $path =$request->receiptFile->store('retirements');  //get image from request
        // $contents = Storage::get($path);
        // return  $contents;

         Attachments::create([
            'details' => $request->details,
            'file' => $request->receiptFile,
            'file_path'=> $path,
            'receiptNumber' => $request->receiptNumber,
            'amount' => $request->amount,
            'rcode' => Retirement::latest()->first()->rcode
        ]);

        $user = User::role('bursar')->get();
        Notification::send($user,new NewRetirementNotify(Retirement::latest()->first(),Auth::user()->name));
        return redirect('uirrm')->with('message', 'RETIREMENT SUCCESSFULLY SENT');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function show($id)
    {
        $retirement = Retirement::find($id);
        $staff = Imprest::imprestStaff($id);

        // $boolean = true ;
        return view('home',compact('retirement','staff'));
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
    public function update(Request $request, $id)
    {
        //
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
}
