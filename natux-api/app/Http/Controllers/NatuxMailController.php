<?php

namespace App\Http\Controllers;

use App\Jobs\SendDistanceMailJob;
use App\Mail\NatuxComingMail;
use App\Models\NatuxMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NatuxMailController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email"
        ]);
        NatuxMail::create($validated);
        for ($i = 100; $i >= 0; $i -= 10) {
            $delaySeconds = (100 - $i);
            SendDistanceMailJob::dispatch($request->email, $i)
                ->delay(now()->addSeconds($delaySeconds));
        }
        return response()->json(["success" => true, "message" => "Natux elkuldve az email tulajdonos hazszamahoz! Koszonjuk hogy igenybe vette szolgaltatasunk!"], 201, options: JSON_UNESCAPED_UNICODE);
    }
    public function index()
    {
        return response()->json(NatuxMail::all(), 200, options: JSON_UNESCAPED_UNICODE);
    }
}
