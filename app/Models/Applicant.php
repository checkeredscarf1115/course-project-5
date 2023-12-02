<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Предложение';
    // protected $primaryKey = ['номер_клиента', 'номер_вакансии'];
    protected $primaryKey = 'номер_клиента';

    protected $fillable = ['номер_клиента', 'номер_вакансии', 'статус_предложения'];
}
