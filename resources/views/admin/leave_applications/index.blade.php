@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Leave Applications</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Leave Type</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveApplications as $leaveApplication)
                    <tr>
                        <td>{{ optional($leaveApplication->employee)->id }}</td>
                        <td>{{ optional($leaveApplication->employee)->name }}</td>
                        <td>{{ optional($leaveApplication->leaveType)->name }}</td>
                        <td>{{ $leaveApplication->description }}</td>
                        <td>{{ $leaveApplication->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
