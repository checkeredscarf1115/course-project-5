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
        Schema::create('Клиент', function (Blueprint $table) {
            $table->increments('номер_клиента');
            $table->string('ФИО', 100);
            $table->string('пол', 1);
            $table->date('дата_рождения');
            $table->string('место_рождения', 100);
            $table->string('место_жительства', 100);
            $table->string('семейное_положение', 9);
            $table->string('образование', 20);
            $table->string('профессия', 30);
            $table->string('последнее_место_работы', 100);
            $table->string('последняя_должность', 30);
            $table->string('требования_к_работе', 200);
            $table->string('адрес_электронной_почты', 50);
            $table->bigInteger('номер_телефона');
            $table->unique(['место_жительства', 'адрес_электронной_почты', 'номер_телефона']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Клиент');
    }
};
