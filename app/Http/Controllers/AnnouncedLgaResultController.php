<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Party;
use Illuminate\Http\Request;
use App\Models\AnnouncedLgaResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AnnouncedLgaResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = Lga::all();
        $parties = Party::all();
        $AnnouncedLgaResults = DB::table('announced_lga_results')
                    ->join('lga', 'announced_lga_results.lga_id', '=', 'lga.id')
                    ->join('parties', 'announced_lga_results.party_id', '=', 'parties.id')
                    ->select('announced_lga_results.*', 'lga.lga_name', 'parties.party_name')
                    ->oldest()
                    ->get();
        return View::make('admin.announcedLgares.index', compact('lgas', 'parties', 'AnnouncedLgaResults'));
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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedLgaRes = new AnnouncedLgaResult();
        $announcedLgaRes->lga_id = $request->lga_name;
        $announcedLgaRes->party_id = $request->party_name;
        $announcedLgaRes->party_score = $request->party_score;
        $announcedLgaRes->entered_by_user = $request->entered_by_user;
        $announcedLgaRes->user_ip_address = request()->getClientIp();
        $announcedLgaRes->save();

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
            'party_name' => 'required',
            'party_score' => 'required | numeric',
            'entered_by_user' => 'required',
        ]);

        $announcedLgaRes = AnnouncedLgaResult::findOrFail($id);
        $announcedLgaRes->lga_id = $request->lga_name;
        $announcedLgaRes->party_id = $request->party_name;
        $announcedLgaRes->party_score = $request->party_score;
        $announcedLgaRes->entered_by_user = $request->entered_by_user;
        $announcedLgaRes->user_ip_address = request()->getClientIp();
        $announcedLgaRes->save();

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
        $announcedLgaRes = AnnouncedLgaResult::findOrFail($id);
        $announcedLgaRes->delete();

        return Redirect::back();
    }
}

