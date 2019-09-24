<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ?? 10;
        $employees = Employee::with('company')->latest()->paginate($perPage);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployee  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        // if validated fails, return the validations errors
        $request->validated();
        $comapanyId = $request->company_id;
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        if (!empty($comapanyId)) {
            $company = Company::find($comapanyId);
            $employee->company()->associate($company);
        }
        $employee->save();
        return redirect()->route('employee.index')->with('success.employee', 'The employee has been create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employee = $employee->load('company');
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        $request->validated();
        $comapanyId = $request->company_id;
        $employee->name = $request->name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        if (!empty($comapanyId)) {
            $company = Company::find($comapanyId);
            $employee->company()->associate($company);
        } else {
            $employee->company()->dissociate();
        }
        $employee->save();
        return redirect()->route('employee.index')->with('success.employee', 'The employee has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            return redirect()->route('employee.index')->with('success.employee', 'The employee has been delete');
        }
    }
}
