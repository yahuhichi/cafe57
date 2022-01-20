@extends('layouts.app')


@section('content')

<div class="table-responsive">
    <p>勤怠一覧画面</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>従業員名</th>
            <th>日付</th>
            <th>勤怠時間</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($shifts as $shift)
            <tr>
                <td>{{ $shift->id }}</td>
                <td>{{ $shift->date}}</td>
                <td>{{ $shift->staff }}</td>
                
                
             
                @endif</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('') }}">共有する</a>
</div>
@endsection



