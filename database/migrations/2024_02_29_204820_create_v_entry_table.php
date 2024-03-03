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
        Schema::create('v_entry', function (Blueprint $table) {
            $table->id();
            $table->string('vno');
            $table->date('vdate');
            $table->time('vtime');
            $table->string('plate');
            $table->string('fleet');
            $table->string('user');
            $table->text('v_des_en'); // Assuming v_des_en can store longer text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_entry');
    }
};
