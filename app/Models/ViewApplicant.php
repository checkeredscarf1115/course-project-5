<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewApplicant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'sqlsrv';

    protected $table = 'Предложение_';
    // protected $primaryKey = ['номер_клиента', 'номер_вакансии'];
    // protected $primaryKey = 'номер_клиента';
    protected $primaryKey = 'id';

    protected $fillable = ['номер_клиента', 'номер_вакансии', 'статус_предложения'];
}
