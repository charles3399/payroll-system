<?php

namespace App\Http\Controllers;

use App\Payrolls;

use App\Employees;

use DataTables;

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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Payrolls::all();

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){

                return '<a href="#" class="btn btn-sm btn-outline-primary">Edit<a/>';
            })
            ->rawColumns(['action'])
            ->editColumn('employees_id', function(Payrolls $payroll){
                return empty($payroll->positions->name) ? $payroll->employees_id : $payroll->employees->lname;
            })
            ->make(true);
        }

        return view('payrolls.index')
        ->with('payrolls', Payrolls::all())
        ->with('employees', Employees::all());
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
    public function edit(Payrolls $payroll)
    {
        return view('payrolls.edit')
        ->with('employees', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayrollsRequest $request, Payrolls $payroll)
    {
        $payroll->update([
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Payroll can't be deleted even if there is a human error
    }
}
