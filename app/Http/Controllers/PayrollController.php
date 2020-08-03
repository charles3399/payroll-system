<?php

namespace App\Http\Controllers;

use App\Payrolls;

use App\Employees;

use App\Positions;

use DB;

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

                return '<a href="'.route('payrolls.edit', $data->id).'" class="btn btn-sm btn-outline-primary">Edit<a/>';
            })
            ->rawColumns(['action','employees_id','id'])
            ->editColumn('created_at', function(Payrolls $payroll){
                return date_format($payroll->created_at, 'Y/m/d h:i a');
            })
            ->editColumn('updated_at', function(Payrolls $payroll){
                return date_format($payroll->updated_at, 'Y/m/d h:i a');
            })
            ->editColumn('employees_id', function(Payrolls $payroll){
                return $payroll->employees->pluck('lname')->first().', '.$payroll->employees->pluck('fname')->first();
            })
            ->editColumn('id', function(Payrolls $payroll){
                return '<a href="'.route('payrolls.show', $payroll->id).'">'.($payroll->id).'</a>'; 
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
       $payroll = Payrolls::create([
            'days_work' => $request->days_work,
            'overtime_hrs' => $request->overtime_hrs,
            'late' => $request->late,
            'absences' => $request->absences,
            'bonuses' => $request->bonuses,
            'employees_id' => $request->employees_id
        ]);

        $payroll->employees()->attach($request->employees_id);

        session()->flash('success', 'Payroll created successfully!');

        return redirect('payrolls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employee, Payrolls $payroll)
    {
        // select payrolls.employees_id, employees.lname, positions.name, positions.basic_pay
        // from payrolls
        // inner join employees on employees.eid = payrolls.employees_id
        // inner join positions on positions.pid = employees.positions_id;

        $basic_pay = DB::table('payrolls')
        ->select('positions.basic_pay')
        ->join('employees', 'employees.id', '=', 'payrolls.employees_id')
        ->join('positions', 'positions.id', '=', 'employees.positions_id')
        ->where('payrolls.employees_id', '=', $payroll->employees_id)
        ->get();

        $position_name = DB::table('payrolls')
        ->select('positions.name')
        ->join('employees', 'employees.id', '=', 'payrolls.employees_id')
        ->join('positions', 'positions.id', '=', 'employees.positions_id')
        ->where('payrolls.employees_id', '=', $payroll->employees_id)
        ->get();

        return view('payrolls.show')
        ->with('payrolls', $payroll)
        ->with('basic_pay', $basic_pay)
        ->with('position_name', $position_name)
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
        ->with('payrolls', $payroll)
        ->with('employees', Employees::all());
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
        
        $payroll->employees()->sync($request->employees_id);

        session()->flash('success', 'Payroll updated successfully!');

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
