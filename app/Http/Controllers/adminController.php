<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\SalaryGrade;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class adminController extends Controller
{
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
