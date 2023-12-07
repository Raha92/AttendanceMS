session_start();
if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")


@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">{{ $employee->name }}'s Attendance Records</h4>
       
        
    </div>
@endsection
@section('button')
    <a href="check" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New</a>
@endsection

@section('content')
@include('includes.flash')

    <!-- resources/views/admin/showIndividualAttendanceLogs.blade.php -->

@extends('layouts.master')

@section('content')
    <!-- resources/views/admin/showIndividualAttendanceLogs.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>{{ $employee->name }}'s Attendance Logs</h1>

    @if ($attendances->isEmpty())
        <p>No attendance logs available.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Attendance</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->attendance_date }}</td>
                        <td>{{ $attendance->emp_id }}</td>
                        <td>{{ $attendance->employee->name }}</td>
                        <td>
                            @if ($attendance->status == 0)
                                Present
                            @else
                                Absent
                            @endif
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

@endsection

@endsection


@section('script')
    <!-- Responsive-table-->
	<!-- Log on to codeastro.com for more projects! -->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
 
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
