<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCourse extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Курс_';
    protected $primaryKey = 'номер_курса';

    protected $fillable = ['номер_курса', 'профессия', 'статус', 'часы_обучения', 'форма_обучения', 'требования_к_образованию', 
    'дата_начала_обучения', 'дата_окончания_обучения', 'номер_ОУ'];
}
