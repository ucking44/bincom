<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Ward;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class PollingUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = Lga::all();
        $wards = Ward::all();
        $pollingUnits = DB::table('polling_units')
                    ->join('lga', 'polling_units.lga_id', '=', 'lga.id')
                    ->join('wards', 'polling_units.ward_id', '=', 'wards.id')
                    ->select('polling_units.*', 'lga.lga_name', 'wards.ward_name')
                    ->oldest()
                    ->get();
        return View::make('admin.pollingUnit.index', compact('lgas', 'wards', 'pollingUnits'));
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
            'ward_name' => 'required',
            'lga_name' => 'required',
            'polling_unit_number' => 'required | numeric',
            'polling_unit_name' => 'required',
            'polling_unit_description' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'entered_by_user' => 'required',
        ]);

        $pollingUnit = new PollingUnit();
        $pollingUnit->ward_id = $request->ward_name;
        $pollingUnit->lga_id = $request->lga_name;
        $pollingUnit->polling_unit_number = $request->polling_unit_number;
        $pollingUnit->polling_unit_name = $request->polling_unit_name;
        $pollingUnit->polling_unit_description = $request->polling_unit_description;
        $pollingUnit->lat = $request->ward_name;
        $pollingUnit->long = $request->ward_name;
        $pollingUnit->entered_by_user = $request->entered_by_user;
        $pollingUnit->user_ip_address = request()->getClientIp();
        $pollingUnit->save();

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
            'ward_name' => 'required',
            'lga_name' => 'required',
            'polling_unit_number' => 'required',
            'polling_unit_name' => 'required',
            'polling_unit_description' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'entered_by_user' => 'required',
        ]);

        $pollingUnit = PollingUnit::findOrFail($id);
        $pollingUnit->ward_id = $request->ward_name;
        $pollingUnit->lga_id = $request->lga_name;
        $pollingUnit->polling_unit_number = $request->polling_unit_number;
        $pollingUnit->polling_unit_name = $request->polling_unit_name;
        $pollingUnit->polling_unit_description = $request->polling_unit_description;
        $pollingUnit->lat = $request->ward_name;
        $pollingUnit->long = $request->ward_name;
        $pollingUnit->entered_by_user = $request->entered_by_user;
        $pollingUnit->user_ip_address = request()->getClientIp();
        $pollingUnit->save();

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
        $pollingUnit = PollingUnit::findOrFail($id);
        $pollingUnit->delete();

        return Redirect::back();

    }
}

