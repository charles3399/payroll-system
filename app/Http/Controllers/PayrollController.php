<?php

namespace App\Http\Controllers;

use App\Payrolls;

use App\Employees;

use App\Http\Requests\CreatePayrollsRequest;

use App\Http\Requests\UpdatePayrollsRequest;

use Illuminate\Http\Request;

class PayrollController extends Controller
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
        return view('payrolls.index')
        ->with('payrolls', Payrolls::all())
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
        return view('payrolls.create')
        ->with('employees', Employees::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePayrollsRequest $request)
    {
        Payrolls::create([
            'days_work' => $request->days_work,
            'overtime_hrs' => $request->overtime_hrs,
            'late' => $request->late,
            'absences' => $request->absences,
            'bonuses' => $request->bonuses,
            'employees_id' => $request->employees_id
        ]);

        return redirect('payrolls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payrolls $payroll, Employees $employee)
    {
        return view('payrolls.show')
        ->with('payrolls', $payroll)
        ->with('employees', $employee);
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
