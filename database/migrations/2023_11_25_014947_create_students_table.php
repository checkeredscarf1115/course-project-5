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
        Schema::create('Обучающийся_на_курсах', function (Blueprint $table) {
            $table->id('номер_курса');
            $table->id('номер_клиента');
            $table->string('статус', 8);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Обучающийся_на_курсах');
    }
};
