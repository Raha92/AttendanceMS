@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header bg-success text-white">
            Attendance Sheet Report
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-md table-hover" id="printTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee</th>
                            <th>Position</th>
                            @php
                                $today = today();
                                $dates = [];
                                for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                }
                            @endphp
                            @foreach ($dates as $date)
                                <th style="white-space: nowrap;"> <!-- Adjust style here -->
                                    {{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position }}</td>
                            @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)
                                @php
                                    $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                    $check_attd = $attendanceData->where('attendance_date', $date_picker)->first();
                                    $check_leave = \App\Models\Leave::where('emp_id', $employee->id)->where('leave_date', $date_picker)->first();
                                @endphp
                                <td>
                                    <div class="form-check form-check-inline">
                                        @if ($check_attd && $check_attd->status == 1)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if ($check_leave && $check_leave->status == 1)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
