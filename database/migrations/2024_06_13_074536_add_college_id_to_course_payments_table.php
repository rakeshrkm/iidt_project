<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('course_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('college_id')->after('id')->nullable();
            $table->foreign('college_id')->references('id')->on('course_payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_payments', function (Blueprint $table) {
            $table->dropColumn('course_payments');
        });
    }
};
