<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        // return view('pages.index',compact('employees'));
        return view('pages.index',["employees"=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                "name"=>"required",
                "email" => "required|email|unique:employees,email",
                "phone"=>"nullable",
            ]);

            Employee::create([
                "name"=>$request->input('name'),
                "email"=>$request->input('email'),
                "phone"=>$request->input('phone'),
            ]);
            Toastr::success('Employee Created successfully.');
            return redirect()->route('employee.index');
        }catch(Exception $e){
            Toastr::error('somthing went wrong');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();
        return view('pages.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $request->validate([
                "name"=>"required",
                "email" => "required|email|unique:employees,email,".$id,
                "phone"=>"nullable",
            ]);

            Employee::where('id',$id)->update([
                "name"=>$request->input('name'),
                "email"=>$request->input('email'),
                "phone"=>$request->input('phone'),
            ]);
            Toastr::success('Employee Updated successfully.');
            return redirect()->route('employee.index');
        }catch(Exception $e){
            Toastr::error('somthing went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        Toastr::success('Employee Deleted successfully.');
        return redirect()->back();
    }

}
