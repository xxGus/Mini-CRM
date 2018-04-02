<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\StoreEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $i = 0;
            $arr_employees = [];
            $employees = Employee::paginate(10);
            foreach ($employees as $employee){
                $arr_employees[$i]['id'] = $employee->id;
                $arr_employees[$i]['first_name'] = $employee->first_name;
                $arr_employees[$i]['last_name'] = $employee->last_name;
                $company= Company::find($employee->company_id);
                $arr_employees[$i]['company'] = $company['name'];
                $arr_employees[$i]['email'] = $employee->email;
                $arr_employees[$i]['phone'] = $employee->phone;
                $i++;
            }
            return view('employees/index', compact('arr_employees', 'employees'));
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('employees/create');
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEmployee $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $validated = $request->validated();

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect('employees')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(Employee $employee)
    {
        if (Auth::check()) {

            $employee = Employee::find($employee->id);
            $companies = Company::all() ;
            return view('employees/edit', compact('employee', 'companies'));
        } else {
            return redirect('login')->with('danger', 'You don\'t have permission to view this page.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreEmployee $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        $validated = $request->validated();

        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        $employee->delete();
        return redirect('employees')->with('success', 'Information has been deleted');
    }
}
