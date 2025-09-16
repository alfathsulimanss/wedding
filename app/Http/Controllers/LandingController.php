<?php

namespace App\Http\Controllers;

use App\Models\InvitationList;
use App\Models\Wedding;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index($slug, $wedding_id, $invited_id, $invited_name){
        $wedding = Wedding::where('id', $wedding_id)->first();
        $invitation = InvitationList::where('id', $invited_id)->first();
        return view('landing.index', [
            'wedding' => $wedding,
            'invitation' => $invitation
        ]);
    }
}
