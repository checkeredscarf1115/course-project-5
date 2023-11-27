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
        Schema::create('Курс', function (Blueprint $table) {
            $table->increments('номер_курса');
            $table->string('профессия', 30);
            $table->string('статус', 10);
            $table->smallInteger('часы_обучения');
            $table->string('форма_обучения', 3);
            $table->string('требования_к_образованию', 20);
            $table->date('дата_начала_обучения');
            $table->date('дата_окончания_обучения');
            $table->integer('номер_ОУ');
            $table->foreign('номер_ОУ')->references('номер_ОУ')->on('Образовательное_учреждение');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Курс');
    }
};
