<?php

namespace App\Http\Controllers;

use App\Employees;

use App\Positions;

use App\Payrolls;

use DataTables;

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
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Employees::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    return '
                    
                    <div class="d-flex justify-content-between"><a href="'.route('employees.edit', $data->id).'" class="btn btn-sm btn-outline-primary mr-2">Edit</a>

                    <form action="'.route('employees.destroy', $data->id).'" method="post">
                        <input type="hidden" name="_token" value="8asviTEaVZdwv4i19RdIELEwVfcQzCp0E1r2F3Q8">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    </form></div>
                    
                    ';

                })
                ->rawColumns(['action','fname'])
                ->editColumn('created_at', function(Employees $employee){
                    return $employee->created_at->diffForHumans();
                })
                ->editColumn('updated_at', function(Employees $employee){
                    return $employee->updated_at->diffForHumans();
                })
                ->editColumn('positions_id', function(Employees $employee){
                    return $employee->positions->name; 
                })
                ->editColumn('fname', function(Employees $employee){
                    return '<a href="'.route('employees.show', $employee->id).'">'.($employee->fname).'</a>'; 
                })
                ->make(true);
        }

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
    public function show(Employees $employee, Positions $position, Payrolls $payroll)
    {
        return view('employees.show')
        ->with('employee', $employee)
        ->with('position', $position)
        ->with('payroll', $payroll);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        return view('employees.edit')
        ->with('employee', $employee)
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
