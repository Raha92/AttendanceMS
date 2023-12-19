<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    // database/migrations/[timestamp]_create_leave_applications_table.php

public function up()
{
    Schema::create('leave_applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('leave_types_id');
        $table->foreign('leave_types_id')->references('id')->on('leave_types');
        $table->text('description')->nullable();

        // Use unsignedInteger for emp_id
        $table->unsignedInteger('emp_id');
        $table->foreign('emp_id')->references('id')->on('employees');

        $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('leave_applications');
}

}
