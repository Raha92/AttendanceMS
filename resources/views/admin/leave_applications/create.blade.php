<!-- resources/views/admin/leave_applications/create.blade.php -->

<!-- resources/views/admin/leave_applications/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Apply for Leave</h1>

        <form action="{{ route('leave-applications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="emp_id">Employee ID:</label>
                <input type="text" name="emp_id" id="emp_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="leave_types_id">Leave Type:</label>
                <select name="leave_types_id" id="leave_types_id" class="form-control" required>
                    @foreach($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                    @endforeach
                </select>
            </div>

           

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            
           

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



            <!-- The 'emp_id' field is now hidden and set to the employee's ID -->
            <input type="hidden" name="emp_id" value="{{ $employee->id }}">

            <!-- Add more fields as needed -->

            
        </form>
    </div>
@endsection
