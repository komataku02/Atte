<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\BreakRecord;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    //勤怠日別ページ表示
    public function show()
    {
        $now = Carbon::now()->format('Y-m-d');
        $user = User::all();
        $attendances = $user->with('attendance')->with('breakRecord')->get();

        return view('attendance',compact('attendances'));
    }

    //勤務開始処理
    public function start()
    {
        $user = Auth::user();

        // 新しい日付の出勤データを作成
        $attendance = new Attendance([
            'date'=>now(),
            'start_time'=>now(),
            'end_time'=>null,
            'break_start'=>null,
            'break_end'=>null,
        ]);

        $user->attendances()->save($attendance);
    

        return redirect()->route('index');
    }

    public function end()
    {
        $user = Auth::user();
        $attendance = $user->attendances()->whereNull('end_time')->first();

        if ($attendance) {
            $attendance->update([
                'end_time' => now(),
            ]);
        }

        return redirect()->route('index');
    }

    public function startBreak()
    {
        $user = Auth::user();
        $attendance = $user->attendances()->whereNull('end_time')->first();

        if (!$attendance) {
            
            return redirect()->route('index')->with('error', '勤務を開始してから休憩を開始してください。');
        }

        $breaks = new BreakRecord();
        $breaks->attendance_id = $attendance->id;
        $breaks->break_start = Carbon::now();
        $breaks->break_end = null;
        $breaks->save();
        
        return redirect()->route('index');
    }

    public function endBreak()
    {
        $user = Auth::user();
        $attendance = $user->attendances()->whereNull('end_time')->first();

        // 勤務が開始されていない場合はエラーを表示または処理を行う
        if (!$attendance) {
            return redirect()->route('index')->with('error', '勤務を開始してから休憩を終了してください。');
        }

        $breaks = new BreakRecord();
        $breaks->attendance_id = $attendance->id;
        $breaks->break_end = Carbon::now();
        $breaks->save;


        return redirect()->route('index');
    }
}
