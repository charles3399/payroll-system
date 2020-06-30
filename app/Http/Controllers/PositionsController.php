<?php

namespace App\Http\Controllers;

use App\Positions;

use App\Employees;

use DataTables;

use Illuminate\Http\Request;

use App\Http\Requests\CreatePositionsRequest;

use App\Http\Requests\UpdatePositionsRequest;

class PositionsController extends Controller
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
            $data = Positions::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    return '
                    
                    <div class="d-flex justify-content-center"><a href="'.route('positions.edit', $data->id).'" class="btn btn-sm btn-outline-primary mr-2">Edit</a>

                    <form action="'.route('positions.destroy', $data->id).'" method="post">
                        <input type="hidden" name="_token" value="'.(csrf_token()).'">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    </form></div>
                    
                    ';
                    
                })
                ->rawColumns(['action','name'])
                ->editColumn('name', function(Positions $position){
                    return '<a href="'.route('positions.show', $position->id).'">'.($position->name).'</a>'; 
                })
                ->make(true);
        }

        return view('positions.index')
        ->with('positions', Positions::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePositionsRequest $request)
    {
        Positions::create([
            'name' => $request->name,
            'basic_pay' => $request->basic_pay,
        ]);

        session()->flash('success', 'Position created successfully!');

        return redirect('positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Positions $position, Employees $employee)
    {
        return view('positions.show')
        ->with('positions', $position)
        ->with('employees', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Positions $position)
    {
        return view('positions.edit')->with('positions', $position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionsRequest $request, Positions $position)
    {
        $position->update([
            'name' => $request->name,
            'basic_pay' => $request->basic_pay,
        ]);

        session()->flash('success', 'Position updated successfully!');

        return redirect('positions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positions $position)
    {
        $position->delete();

        session()->flash('success', 'Position deleted!');

        return redirect('positions');
    }
}
