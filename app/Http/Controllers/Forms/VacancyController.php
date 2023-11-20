<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VacancyController extends Controller
{
    public function show(): View {
        // $labels = ['ФИО', 'пол', 'дата рождения', 'место рождения', 'место жительства', 'семейное положение', 
        // 'образование', 'профессия', 'последнее место работы', 'последняя должность', 'требования к работе',
        // 'адрес электронной почты', 'номер телефона'
        // ];
        // $names = ['full_name', 'sex', 'birthdate', 'birthplace', 'residence', 'martial_status', 
        // 'education', 'profession', 'previous_workplace', 'previous_job_title', 'requirements', 
        // 'email', 'phone_number'
        // ];

        $data = [];
        $data['company'] = [
            'EIN' => 'ИНН компании',
            'job_title' => 'должность',
            'responsibilities' => 'обязанности',
            'requirements' => 'требования',
            'conditions' => 'условия',
        ];
        $data['period'] = [
            'status' => 'статус',
            'create_date' => 'дата открытия',
            'close_date' => 'дата закрытия',
        ];

        // $data = array($labels, $names);
        return view('forms.admin.vacancy')->with('data', $data); 
    }
}
