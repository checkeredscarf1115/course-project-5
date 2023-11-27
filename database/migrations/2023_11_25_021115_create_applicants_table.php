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
        Schema::create('Предложение', function (Blueprint $table) {
            $table->id('номер_вакансии');
            $table->id('номер_клиента');
            $table->string('статус_предложения', 8);
            $table->foreign('номер_вакансии')->references('номер_вакансии')->on('Вакансия');
            $table->foreign('номер_клиента')->references('номер_клиента')->on('Клиент');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Предложение');
    }
};
