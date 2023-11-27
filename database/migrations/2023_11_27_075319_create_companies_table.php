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
        Schema::create('Компания', function (Blueprint $table) {
            $table->id('ИНН_кмопании');
            $table->string('название_компании', 60);
            $table->string('направление_деятельности', 65);
            $table->string('адрес_офиса', 100);
            $table->string('адрес_электронной_почты', 50);
            $table->bigInteger('рабочий_телефон');
            $table->unique(['адрес_офиса', 'адрес_электронной_почты', 'рабочий_телефон']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Компания');
    }
};
