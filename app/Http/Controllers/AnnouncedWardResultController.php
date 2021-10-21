<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnnouncedWardResult;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AnnouncedWardResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Ward::all();
        $parties = Party::all();
        $AnnouncedWardResults = DB::table('announced_ward_results')
                    ->join('wards', 'announced_ward_results.ward_id', '=', 'wards.id')
                    ->join('parties', 'announced_ward_results.party_id', '=', 'parties.id')
                    ->select('announced_ward_results.*', 'wards.ward_name', 'parties.party_name')
                    ->oldest()
                    ->get();
        return View::make('admin.announcedWardRes.index', compact('wards', 'parties', 'AnnouncedWardResults'));
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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedWardRes = new AnnouncedWardResult();
        $announcedWardRes->ward_id = $request->ward_name;
        $announcedWardRes->party_id = $request->party_name;
        $announcedWardRes->party_score = $request->party_score;
        $announcedWardRes->entered_by_user = $request->entered_by_user;
        $announcedWardRes->user_ip_address = request()->getClientIp();
        $announcedWardRes->save();

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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedWardRes = AnnouncedWardResult::findOrFail($id);
        $announcedWardRes->ward_id = $request->ward_name;
        $announcedWardRes->party_id = $request->party_name;
        $announcedWardRes->party_score = $request->party_score;
        $announcedWardRes->entered_by_user = $request->entered_by_user;
        $announcedWardRes->user_ip_address = request()->getClientIp();
        $announcedWardRes->save();

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
        $announcedWardRes = AnnouncedWardResult::findOrFail($id);
        $announcedWardRes->delete();

        return Redirect::back();
    }
}

