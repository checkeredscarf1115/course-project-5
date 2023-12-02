<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Клиент';
    protected $primaryKey = 'номер_клиента';

    protected $fillable = ['номер_клиента', 'ФИО', 'пол', 'дата_рождения', 'место_рождения', 'место_жительства', 
    'семейное_положение', 'образование', 'профессия', 'последнее_место_работы', 'последняя_должность', 'требования_к_работе', 
    'адрес_электронной_почты', 'номер_телефона', 'место_жительства', 'адрес_электронной_почты', 'номер_телефона'];
}
