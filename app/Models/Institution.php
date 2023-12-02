<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Образовательное_учреждение';
    protected $primaryKey = 'номер_ОУ';

    protected $fillable = ['номер_оу', 'название_оу', 'адрес_оу', 'адрес_электронной_почты_оу', 'телефон_оу'];
}
