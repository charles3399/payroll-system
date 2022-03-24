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

                return '
                    
                    <div class="d-flex justify-content-between"><a href="'.route('payrolls.edit', $data->id).'" class="btn btn-sm btn-outline-primary mr-2">Edit</a>

                    <form action="'.route('payrolls.destroy', $data->id).'" method="post">
                        <input type="hidden" name="_token" value="'.(csrf_token()).'">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    </form></div>
                    
                    ';

            })
            ->rawColumns(['action','employees_id','id'])
            ->editColumn('created_at', function(Payrolls $payroll){
                return date_format($payroll->created_at, 'Y/m/d h:i a');
            })
            ->editColumn('updated_at', function(Payrolls $payroll){
                return date_format($payroll->updated_at, 'Y/m/d h:i a');
            })
            ->editColumn('employees_id', function(Payrolls $payroll){
                if($payroll->employees->count() > 0){
                    return $payroll->employees->pluck('lname')->first().', '.$payroll->employees->pluck('fname')->first();
                }
                else{
                    $payroll->delete();
                    return redirect()->back();
                }
            })
            ->editColumn('id', function(Payrolls $payroll){
                if($payroll->employees->count() > 0){
                    return '<a href="'.route('payrolls.show', $payroll->id).'">'.($payroll->id).'</a>';
                }
                else{
                    return '';
                }
            })
            ->make(true);
        }

        return view('payrolls.index')
        ->with('payrolls', Payrolls::all());
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

        //Earnings
        $hourly = $basic_pay->pluck('basic_pay')->first();
        $per_day = $hourly * 8;
        $monthly = $per_day * $payroll->days_work;
        $overtime = (($hourly * 0.5) + $hourly ) * $payroll->overtime_hrs;
        $bonus = $payroll->bonuses;
        $gross_income = $monthly + $overtime + $bonus;
        
        //Deductions
        $late = $payroll->late;
        $absent = $payroll->absences;
        $late_perpay = $hourly / 60;
        $late_overall = $late_perpay * $late;
        $absent_overall = $hourly * 8 * $absent;
        $sss = round($monthly * 0.0447);
        $hdmf = round($monthly * 0.02);
        $philhealth = round($monthly * 0.04);

        //Net Pay
        $total_deductions = $sss + $hdmf + $philhealth + $late_overall + $absent_overall;
        $net_pay = $gross_income - $total_deductions;

        return view('payrolls.show')
        ->with('payrolls', $payroll)
        ->with('basic_pay', $basic_pay)
        ->with('position_name', $position_name)
        ->with('employees', $employee)
        ->with('monthly', $monthly)
        ->with('overtime', $overtime)
        ->with('bonus', $bonus)
        ->with('gross_income', $gross_income)
        ->with('sss', $sss)
        ->with('hdmf', $hdmf)
        ->with('philhealth', $philhealth)
        ->with('late_overall', $late_overall)
        ->with('absent_overall', $absent_overall)
        ->with('total_deductions', $total_deductions)
        ->with('net_pay', $net_pay);
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

    public function destroy(Payrolls $payroll)
    {
        $payroll->delete();

        session()->flash('delete', 'Payroll has been deleted!');

        return redirect('payrolls');
    }
}
