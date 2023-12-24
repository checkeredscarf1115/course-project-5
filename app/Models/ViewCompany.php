<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCompany extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Компания_';
    protected $primaryKey = 'ИНН_компании';

    protected $fillable = ['ИНН_компании', 'название_компании', 'направление_деятельности', 'адрес_офиса', 
    'адрес_электронной_почты', 'рабочий_телефон', 'адрес_офиса', 'адрес_электронной_почты', 'рабочий_телефон'];
}
