<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnnouncedStateResult;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AnnouncedStateResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $parties = Party::all();
        $AnnouncedStateResults = DB::table('announced_state_results')
                    ->join('states', 'announced_state_results.state_id', '=', 'states.id')
                    ->join('parties', 'announced_state_results.party_id', '=', 'parties.id')
                    ->select('announced_state_results.*', 'states.state_name', 'parties.party_name')
                    ->oldest()
                    ->get();
        return View::make('admin.announcedStateRes.index', compact('states', 'parties', 'AnnouncedStateResults'));
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
            'state_name' => 'required',
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedStateRes = new AnnouncedStateResult();
        $announcedStateRes->state_id = $request->state_name;
        $announcedStateRes->party_id = $request->party_name;
        $announcedStateRes->party_score = $request->party_score;
        $announcedStateRes->entered_by_user = $request->entered_by_user;
        $announcedStateRes->user_ip_address = request()->getClientIp();
        $announcedStateRes->save();

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
            'state_name' => 'required',
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedStateRes = AnnouncedStateResult::findOrfail($id);
        $announcedStateRes->state_id = $request->state_name;
        $announcedStateRes->party_id = $request->party_name;
        $announcedStateRes->party_score = $request->party_score;
        $announcedStateRes->entered_by_user = $request->entered_by_user;
        $announcedStateRes->user_ip_address = request()->getClientIp();
        $announcedStateRes->save();

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
        $announcedStateRes = AnnouncedStateResult::findOrfail($id);
        $announcedStateRes->delete();

        return Redirect::back();
    }
}

