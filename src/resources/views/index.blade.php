@extends('layouts.app1')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="container">
  <h2 class="user-title">{{ auth()->user()->name }} さんお疲れ様です！</h2>
  <div class="button-group">
    <form class="work_time" action="{{ route('attendance.start') }}" method="post">
      @csrf
      @if (is_null($user))
      <input type="submit" class="work-button" name="start_time" value="勤務開始"> <!--trueの時-->
      @else <input type="submit" class="work-button" style="background:silver;" name="start_time" value="勤務"> <!--falseの時-->
      @endif
    </form>
    <form class="work_time" action="{{ route('attendance.end') }}" method="post">
      @csrf
      @if (!is_null($user) && is_null($user->end_time))
      <input type="submit" class="work-button" name="end_time" value="勤務終了"> <!-- start_timeを持っていて、end_timeが持っていない場合 -->
      @else
      <input type="submit" class="work-button" style="background:silver;" name="end_time" value="勤務終了"> <!--それ以外の場合-->
      @endif
    </form>
  </div>
  <div class="button-group">
    <form class="break_time" action="{{ route('attendance.startBreak') }}" method="post">
      @csrf
      @if (!is_null($user) && $breakRecord->break_end)
      <input type="submit" class="work-button" name="break_start" value="休憩開始">
      @else
      <input type="submit" class="work-button" style="background:silver;" name="break_start" value="休憩開始">
      @endif
    </form>
    <form class="break_time" action="{{ route('attendance.endBreak') }}" method="post">
      @csrf
      @if (!is_null($user) && $breakRecord->break_start )
      <input type="submit" class="work-button" name="break_end" value="休憩終了">
      @else
      <input type="submit" class="work-button" style="background:silver;" name="break_end" value="休憩終了">
      @endif
    </form>
  </div>
</div>
@endsection