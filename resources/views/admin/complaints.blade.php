
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>所有投訴</h1>
        <table class="table">
            <thead>
            <tr>
                <th>用戶</th>
                <th>投訴內容</th>
                <th>提交時間</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->user->name }}</td>
                    <td>{{ $complaint->complaint }}</td>
                    <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
