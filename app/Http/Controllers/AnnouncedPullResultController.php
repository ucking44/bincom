<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnnouncedPullResult;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AnnouncedPullResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pollingUnits = PollingUnit::all();
        $parties = Party::all();
        $AnnouncedPullResults = DB::table('announced_pull_results')
                    ->join('polling_units', 'announced_pull_results.pulling_unit_id', '=', 'polling_units.id')
                    ->join('parties', 'announced_pull_results.party_id', '=', 'parties.id')
                    ->select('announced_pull_results.*', 'polling_units.polling_unit_name', 'parties.party_name')
                    ->oldest()
                    ->get();
        return View::make('admin.announcedPullres.index', compact('pollingUnits', 'parties', 'AnnouncedPullResults'));
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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedPullRes = new AnnouncedPullResult();
        $announcedPullRes->pulling_unit_id = $request->polling_unit_name;
        $announcedPullRes->party_id = $request->party_name;
        $announcedPullRes->party_score = $request->party_score;
        $announcedPullRes->entered_by_user = $request->entered_by_user;
        $announcedPullRes->user_ip_address = request()->getClientIp();
        $announcedPullRes->save();

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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedPullRes = AnnouncedPullResult::findOrFail($id);
        $announcedPullRes->pulling_unit_id = $request->polling_unit_name;
        $announcedPullRes->party_id = $request->party_name;
        $announcedPullRes->party_score = $request->party_score;
        $announcedPullRes->entered_by_user = $request->entered_by_user;
        $announcedPullRes->user_ip_address = request()->getClientIp();
        $announcedPullRes->save();

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
        $announcedPullRes = AnnouncedPullResult::findOrFail($id);
        $announcedPullRes->delete();

        return Redirect::back();
    }
}
