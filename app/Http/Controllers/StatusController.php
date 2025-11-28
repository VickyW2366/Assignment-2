<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Bus;
use App\Models\Status;
use mysqli;

class StatusController extends Controller
{
function index()
    {
        $statuses = Status::all();
        return view('statuses.index', ['statuses' => $statuses]);
    }
}
