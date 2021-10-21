<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = Lga::all();
        $wards = DB::table('wards')
                    ->join('lga', 'wards.lga_id', '=', 'lga.id')
                    ->select('wards.*', 'lga.lga_name')
                    ->oldest()
                    ->get();
        return View::make('admin.ward.index', compact('lgas', 'wards'));
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
            'ward_name' => 'required',
            'entered_by_user' => 'required',
            'ward_description' => 'required',
        ]);

        $ward = new Ward();
        $ward->lga_id = $request->lga_name;
        $ward->ward_name = $request->ward_name;
        $ward->entered_by_user = $request->entered_by_user;
        $ward->ward_description = $request->ward_description;
        $ward->user_ip_address = request()->getClientIp();
        $ward->save();

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
            'ward_name' => 'required',
            'entered_by_user' => 'required',
            'ward_description' => 'required',
        ]);

        $ward = Ward::findOrFail($id);
        $ward->lga_id = $request->lga_name;
        $ward->ward_name = $request->ward_name;
        $ward->entered_by_user = $request->entered_by_user;
        $ward->ward_description = $request->ward_description;
        $ward->user_ip_address = request()->getClientIp();
        $ward->save();

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
        $ward = Ward::findOrFail($id);
        $ward->delete();

        return Redirect::back();
    }
}
