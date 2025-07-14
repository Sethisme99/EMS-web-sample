<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        //insert default positions
        DB::table('positions')->insert([
            ['title' => 'HR Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Recruiter', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Finance Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Accountant', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'IT Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Software Engineer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Frontend Developer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Backend Developer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Network Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Marketing Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Content Writer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sales Executive', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Customer Support Representative', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Operations Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Logistics Coordinator', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Product Manager', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Legal Advisor', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Procurement Officer', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Administrative Assistant', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Quality Assurance Engineer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
