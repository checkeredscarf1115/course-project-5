<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewVacancy extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Вакансия_';
    protected $primaryKey = 'номер_вакансии';

    protected $fillable = ['номер_вакансии', 'ИНН_компании', 'должность', 'обязанности', 'требования', 'условия', 
    'дата_создания', 'дата_закрытия'];
}
