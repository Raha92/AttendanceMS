<!-- resources/views/admin/leave_types/edit.blade.php -->

@extends('layouts.master')

@section('content')
    @include('includes.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Leave Type</h4>

                    <form action="{{ route('leave-types.update', $leaveType->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group">
                            <label for="name">Leave Type:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $leaveType->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control">{{ old('description', $leaveType->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Leave Type</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
