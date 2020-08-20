<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\SalaryGrade;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class adminController extends Controller


{
   public function graphs()
   {
     //$chart = new LaravelChart($options);
     $chart_options = [
        'chart_title' => 'Users by months',
        'report_type' => 'group_by_date',
        'model' => 'App\User',
        'group_by_field' => 'created_at',
        'group_by_period' => 'month',
        'chart_type' => 'bar',
    ];
    $chart1 = new LaravelChart($chart_options);

    return view('home', compact('chart1'));

   }


    public function createDesignation(Request $request){
        $request->validate(
            [
                'name'=> 'required'
            ]
            );
        Designation::create([
            'name'=> $request->name
        ]);
    }

     public function createDepartment(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required'
            ]
            );
            Department::create([
                'name'=> $request->name
            ]);

            return redirect()->back()->with('message','DEPARTMENT CREATED SUCCESSFUL');

    }

    public function newSalaryGrade(Request $request)
    {
        $request->validate(
            [
                'grade'=> ['required','unique:salaryGrades'],
                'from' => ['required','numeric'],
                'to'=>['required','gt:from']
            ]
            );
           SalaryGrade::create([
                'grade'=> $request->grade,
                'from' => $request->from,
                'to'=>$request->to
            ]);
            return redirect()->back()->with('message','SALARY GRADE CREATED SUCCESSFUL');

    }
    public function newRole(Request $request)
    {
        // dd($request->role);
        $role = Role::create(['name' => $request->role]);
        return redirect('/rolesAndPermission');
        return redirect()->back()->with('message','ROLE CREATED SUCCESSFUL');
    }

}
