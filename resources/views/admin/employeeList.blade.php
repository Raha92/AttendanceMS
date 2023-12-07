<!-- resources/views/admin/employeeList.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Employee List</h1>

    @foreach($employees as $employee)
        {{-- <p><a href="{{ route('individualAttendance)', ['emp_id' => $employee->id]) }}">{{ $employee->name }}</a></p> --}}
        <li><a href="{{ route('employee-list') }}">Employee List</a></li>
    @endforeach
@endsection
