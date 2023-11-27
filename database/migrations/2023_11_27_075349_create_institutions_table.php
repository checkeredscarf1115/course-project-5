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
        Schema::create('Образовательное_учреждение', function (Blueprint $table) {
            $table->id('номер_оу');
            $table->string('название_оу', 100);
            $table->string('адрес_оу', 100);
            $table->string('адрес_электронной_почты_оу', 50);
            $table->bigInteger('телефон_оу');
            $table->unique(['адрес_оу', 'адрес_электронной_почты_оу', 'телефон_оу']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
