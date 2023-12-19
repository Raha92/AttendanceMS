@extends('layouts.master')

@section('content')
    @include('includes.flash')

    <div class="row mb-3">
        <div class="col-12">
            <a href="{{ route('leave-types.create') }}" class="btn btn-success">
                <i class="mdi mdi-plus mr-2"></i>Add New Leave Type
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="color: white;">Sl No</th>
                                        <th style="color: white;" width="120">Leave Type</th>
                                        <th style="color: white;" width="180">Description</th>
                                        <th style="color: white;" align="center">Created Time</th>
                                        <th style="color: white;" align="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaveTypes as $key => $leaveType)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $leaveType->name }}</td>
                                            <td>{{ $leaveType->description }}</td>
                                            <td>{{ $leaveType->created_at }}</td>
                                            <td>
                                                <a href="{{ route('leave-types.edit', $leaveType->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="mdi mdi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('leave-types.destroy', $leaveType->id) }}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this leave type?')">
                                                        <i class="mdi mdi-delete"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
