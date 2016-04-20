<?php

namespace BikeUsageTracker\Http\Controllers;

use BikeUsageTracker\Http\Requests;
use BikeUsageTracker\Http\Controllers\Controller;

use BikeUsageTracker\BikeType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BikeTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $biketype = BikeType::paginate(15);

        return view('biketype.index', compact('biketype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('biketype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        BikeType::create($request->all());

        Session::flash('flash_message', 'BikeType added!');

        return redirect('biketype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biketype = BikeType::findOrFail($id);

        return view('biketype.show', compact('biketype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biketype = BikeType::findOrFail($id);

        return view('biketype.edit', compact('biketype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $biketype = BikeType::findOrFail($id);
        $biketype->update($request->all());

        Session::flash('flash_message', 'BikeType updated!');

        return redirect('biketype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        BikeType::destroy($id);

        Session::flash('flash_message', 'BikeType deleted!');

        return redirect('biketype');
    }

}
