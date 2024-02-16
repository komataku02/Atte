<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $user = Auth::user();

        //今日の勤務開始
        $attendance = $user->attendances()->whereDate('start_time',$now)->first();

        //今日の休憩かつ最後のデータ(休憩は1日に複数存在するため最後に押した休憩を取得)
        $breakRecord = $user->breakRecords()->latest('created_at')->whereDate('break_records'.'break_start',$now)->first();

        return view('index', compact('user','attendance','breakRecord'));
    }

}
