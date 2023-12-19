<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('admin.leave_types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('admin.leave_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        LeaveType::create($request->all());

        return redirect()->route('leave-types.index')->with('success', 'Leave type added successfully');
    }

    public function edit($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        return view('admin.leave_types.edit', compact('leaveType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $leaveType = LeaveType::findOrFail($id);
        $leaveType->update($request->all());

        return redirect()->route('leave-types.index')->with('success', 'Leave type updated successfully');
    }

    public function destroy($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        $leaveType->delete();

        return redirect()->route('leave-types.index')->with('success', 'Leave type deleted successfully');
    }
}
