<?php

namespace App\Http\Controllers;

use App\Models\AgentName;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AgentNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pollingUnits = PollingUnit::all();
        $agentNames = DB::table('agent_names')
                    ->join('polling_units', 'agent_names.pollingUnit_id', '=', 'polling_units.id')
                    ->select('agent_names.*', 'polling_units.polling_unit_name')
                    ->oldest()
                    ->get();
        return View::make('admin.agentName.index', compact('pollingUnits', 'agentNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'polling_unit_name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
        ]);

        $agentName = new AgentName();
        $agentName->pollingUnit_id = $request->polling_unit_name;
        $agentName->firstName = $request->firstName;
        $agentName->lastName = $request->lastName;
        $agentName->email = $request->email;
        $agentName->phone = $request->phone;
        $agentName->save();

        return Redirect::back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'polling_unit_name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $agentName = AgentName::findOrFail($id);
        $agentName->pollingUnit_id = $request->polling_unit_name;
        $agentName->firstName = $request->firstName;
        $agentName->lastName = $request->lastName;
        $agentName->email = $request->email;
        $agentName->phone = $request->phone;
        $agentName->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agentName = AgentName::findOrFail($id);
        $agentName->delete();

        return Redirect::back();
    }
}

