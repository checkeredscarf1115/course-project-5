<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Обучающийся_на_курсах';
    protected $primaryKey = ['номер_клиента', 'номер_курса'];
}
