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
        Schema::create('category_forms', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('form')->nullable();
            $table->string('type')->nullable();
            $table->string('img')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_forms');
    }
};
