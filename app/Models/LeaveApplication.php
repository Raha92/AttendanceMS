<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;

    protected $fillable = ['leave_types_id', 'description', 'emp_id', 'status'];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    // Define the relationship with the LeaveType model
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_types_id');
    }
}
