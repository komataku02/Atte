@extends('layouts.app1')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="container">
  <h2 class="by_date">{{ $date }}</h2>
  <div class="register-top">
    <div class="register-table">
      <table>
        <tr class="table-tittle">
          <th>名前</th>
          <th>勤務開始</th>
          <th>勤務終了</th>
          <th>休憩時間</th>
          <th>勤務時間</th>
        </tr>
        @foreach($attendances as $attendance)
        <td>{{ $attendance->name }}</td>
        <td>{{ $attendance->attendance->start_time }}</td>
        <td>{{ $attendance->attendance->end_time }}</td>
        <td>{{ $attendance->BreakRecord->break_start }}</td>
        <td>{{ $attendance->BreakRecord->break_end }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection