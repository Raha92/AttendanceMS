<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
    public function create()
    {
        // Fetch all leave types
        $leaveTypes = LeaveType::all();

        // For demonstration, let's assume you want to get the first employee
        // You can customize this query based on your logic
        $employee = Employee::first();

        // Pass the necessary data to the view
        return view('admin.leave_applications.create', compact('leaveTypes', 'employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_types_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'emp_id' => 'required|integer',
        ]);

        LeaveApplication::create([
            'leave_types_id' => $request->input('leave_types_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'emp_id' => $request->input('emp_id'),
            'status' => 'pending',
        ]);

        // Redirect to the leave applications view for the specific employee
        return redirect()->route('leave-applications.index', ['emp_id' => $request->input('emp_id')])
            ->with('success', 'Leave application submitted successfully.');
    }

    // Add other methods as needed...
    
    public function indexForEmployee($emp_id)
    {
        // Fetch leave applications for the specified employee
        $leaveApplications = LeaveApplication::where('emp_id', $emp_id)->get();

        // Pass the necessary data to the view
        return view('admin.leave_applications.index', compact('leaveApplications'));
    }
}
