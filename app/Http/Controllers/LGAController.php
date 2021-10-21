<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class LGAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();
        $localGovtAreas = DB::table('lga')
                    ->join('states', 'lga.state_id', '=', 'states.id')
                    ->select('lga.*', 'states.state_name')
                    ->oldest()
                    ->get();
        return View::make('admin.lga.index', compact('states', 'localGovtAreas'));
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
            'lga_name' => 'required',
            'state_name' => 'required',
            'entered_by_user' => 'required',
            'lga_description' => 'required',
        ]);

        $localGovtArea = new Lga();
        $localGovtArea->lga_name = $request->lga_name;
        $localGovtArea->state_id = $request->state_name;
        $localGovtArea->entered_by_user = $request->entered_by_user;
        $localGovtArea->lga_description = $request->lga_description;
        $localGovtArea->user_ip_address = request()->getClientIp();
        // $localGovtArea->user_ip_address = request()->ip();
        $localGovtArea->save();

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
            'lga_name' => 'required',
            'state_name' => 'required',
            'entered_by_user' => 'required',
            'lga_description' => 'required',
        ]);

        $localGovtArea = Lga::findOrFail($id);
        $localGovtArea->lga_name = $request->lga_name;
        $localGovtArea->state_id = $request->state_name;
        $localGovtArea->entered_by_user = $request->entered_by_user;
        $localGovtArea->lga_description = $request->lga_description;
        $localGovtArea->user_ip_address = request()->getClientIp();
        $localGovtArea->save();

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
        $localGovtArea = Lga::findOrFail($id);
        $localGovtArea->delete();

        return Redirect::back();
    }
}
