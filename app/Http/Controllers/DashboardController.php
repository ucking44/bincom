<?php

namespace App\Http\Controllers;

use App\Models\Lga;
//use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\Party;
use App\Models\State;
use App\Models\AgentName;
use App\Models\PollingUnit;
use App\Models\AnnouncedLgaResult;
use App\Models\AnnouncedPullResult;
use App\Models\AnnouncedWardResult;
use App\Models\AnnouncedStateResult;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $agentName = AgentName::count();
        $announcedLgaRes = AnnouncedLgaResult::count();
        $announcedPullRes = AnnouncedPullResult::count();
        $announcedStateRes = AnnouncedStateResult::count();
        $announcedWardRes = AnnouncedWardResult::count();
        $lga = Lga::count();
        $party = Party::count();
        $pollingUnit = PollingUnit::count();
        $state = State::count();
        $ward = Ward::count();

        return View::make('admin.dashboard', compact('agentName', 'announcedLgaRes', 'announcedPullRes', 'announcedStateRes', 'announcedWardRes', 'lga', 'party', 'pollingUnit', 'state', 'ward'));

    }
}

