<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Retirement;
use Illuminate\Http\Request;

class retirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Retirement::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $retirement = Retirement::create($request->all());
       return response()->json($retirement,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retirement  $retirement
     * @return \Illuminate\Http\Response
     */
    public function show(Retirement $retirement)
    {
     return $retirement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retirement  $retirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retirement $retirement)
    {
        $retirement->update($request->all());
        return response()->json($retirement,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retirement  $retirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retirement $retirement)
    {
        $retirement->delete();
        return response()->json(null,204);
    }
}
