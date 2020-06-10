<?php

namespace App\Http\Controllers;

use App\Positions;

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
    public function index()
    {
        return view('positions.index')->with('positions', Positions::all());
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

        return redirect('positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Positions $position)
    {
        return view('positions.show')->with('positions', $position);
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

        return redirect('positions');
    }
}
