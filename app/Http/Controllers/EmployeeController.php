<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get employees
        $employees = Employee::Paginate(15);
        //Return Employees as collection
        return EmployeeResource::collection($employees);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newEmployee = new Employee();

        $newEmployee->name = $request->input('name');
        $newEmployee->age = $request->input('age');
        $newEmployee->phone_number = $request->input('phone_number');
        $newEmployee->address = $request->input('address');
        $newEmployee->next_of_kin = $request->input('next_of_kin');
        $newEmployee->next_of_kin_phone_number = $request->input('next_of_kin_phone_number');
        $newEmployee->next_of_kin_address = $request->input('next_of_kin_address');
        $newEmployee->driver_license_url = $request->input('driver_license_url');


        //save employee

        if($newEmployee->save()){

            return new EmployeeResource($newEmployee);
        } 



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->name = $request->input('name');
        $employee->age = $request->input('age');
        $employee->phone_number = $request->input('phone_number');
        $employee->address = $request->input('address');
        $employee->next_of_kin = $request->input('next_of_kin');
        $employee->next_of_kin_phone_number = $request->input('next_of_kin_phone_number');
        $employee->next_of_kin_address = $request->input('next_of_kin_address');
        $employee->driver_license_url = $request->input('driver_license_url');


        if($employee->update()){

            return new EmployeeResource($employee);
        }


}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->delete()){

            return response()->json(["message" => "Employee record has been deleted!"]);
        }
    }
}
