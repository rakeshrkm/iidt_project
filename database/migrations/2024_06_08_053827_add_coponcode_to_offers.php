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
        Schema::table('offers', function (Blueprint $table) {
            $table->unSignedBigInteger('college_id')->after('course_id')->nullable();
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('NO ACTION');
            $table->string('coupon_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('college_id');
            $table->dropColumn('coupon_code');
        });
    }
};
