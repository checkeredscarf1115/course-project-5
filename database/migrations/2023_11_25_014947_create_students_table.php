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
            $table->foreign('номер_курса')->references('номер_курса')->on('Курс');
            $table->foreign('номер_клиента')->references('номер_клиента')->on('Клиент');
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
