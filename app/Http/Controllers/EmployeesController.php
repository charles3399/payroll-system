<?php

namespace App\Http\Controllers;

use App\Employees;

use App\Positions;

use Illuminate\Http\Request;

use App\Http\Requests\CreateEmployeesRequest;

use App\Http\Requests\UpdateEmployeesRequest;

class EmployeesController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index')
        ->with('employees', Employees::all())
        ->with('positions', Positions::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create')
        ->with('positions', Positions::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeesRequest $request)
    {
        Employees::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'address' => $request->address,
            'positions_id' => $request->positions_id,
        ]);

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee, Positions $position)
    {
        return view('employees.show')->with('employee', $employee)
        ->with('position', $position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        return view('employees.edit')->with('employee', $employee)
        ->with('positions', Positions::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, Employees $employee)
    {
        $employee->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'address' => $request->address,
            'positions_id' => $request->positions_id
        ]);

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();

        return redirect('employees');
    }
}
