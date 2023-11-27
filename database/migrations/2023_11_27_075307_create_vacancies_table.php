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
        Schema::create('Вакансия', function (Blueprint $table) {
            $table->increments('номер_вакансии');
            $table->bigInteger('ИНН_компании');
            $table->string('должность', 40);
            $table->string('обязанности', 200);
            $table->string('требования', 200);
            $table->string('условия', 200);
            $table->date('дата_создания');
            $table->date('дата_закрытия');
            $table->foreign('ИНН_компании')->references('ИНН_компании')->on('Компания');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Вакансия');
    }
};
