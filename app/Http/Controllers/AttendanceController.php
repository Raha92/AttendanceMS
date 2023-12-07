<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Employee;
use App\Models\Latetime;
use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AttendanceEmp;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{   
    //show attendance 
    public function index()
    {  
        return view('admin.attendance')->with(['attendances' => Attendance::all()]);
    }

    //show late times
    public function indexLatetime()
    {
        return view('admin.latetime')->with(['latetimes' => Latetime::all()]);
    }

    

    
    public static function lateTimeDevice($att_dateTime, Employee $employee)
    {
        $attendance_time = new DateTime($att_dateTime);
        $checkin = new DateTime($employee->schedules->first()->time_in);
        $difference = $checkin->diff($attendance_time)->format('%H:%I:%S');

        $latetime = new Latetime();
        $latetime->emp_id = $employee->id;
        $latetime->duration = $difference;
        $latetime->latetime_date = date('Y-m-d', strtotime($att_dateTime));
        $latetime->save();
    }
    public function showEmployeeList()
    {
        $employees = Employee::all();
        return view('admin.employeeList', compact('employees'));
    }

    public function showAttendance($emp_id){

        $employee = Employee::findOrFail($emp_id);
        $attendances = $employee->attendance;

        return view('admin.showattendance', compact('employee', 'attendances'));

    }
    // AttendanceController.php



    // ... existing methods ...

    // New method to update attendance status
    public function updateStatus(Request $request, $id)
{
    $attendance = Attendance::find($id);

    

    if ($attendance) {
        // Add this line for debugging
        dd($request->status);

        $attendance->update([
            'status' => $request->status,
        ]);
    }
}

}

    
    

        
    


  

