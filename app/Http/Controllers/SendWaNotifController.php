<?php

namespace App\Http\Controllers;

use App\Jobs\SendWaJob;
use App\Models\InvitationList;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SendWaNotifController extends Controller
{
    public function sendWa(){
        $name = 'Edo';
        $number = '6282285314950';
        $slug = 'Edo & Zizah';
        SendWaJob::dispatch($name, $number, $slug);
    }
}
