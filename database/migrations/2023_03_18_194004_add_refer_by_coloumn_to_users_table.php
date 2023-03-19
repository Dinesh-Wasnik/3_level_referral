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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('refer_by')->default(0)
            ->foreign('refer_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {       
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_refer_by_foreign');
                $table->dropColumn('refer_by');
            });
    }
};
