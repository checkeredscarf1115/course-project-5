<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
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
        $data['personal_data'] = [
            'full_name' => 'ФИО',
            'sex' => 'пол',
            'birthdate' => 'дата рождения',
            'birthplace' => 'место рождения',
            'residence' => 'место жительства',
            'martial_status' => 'семейное положение',
        ];
        $data['professional_background'] = [
            'education' => 'образование',
            'profession' => 'профессия',
            'previous_workplace' => 'последнее место работы',
            'previous_job_title' => 'последняя должность',
            'requirements' => 'требования к работе',
        ];
        $data['contact'] = [
            'email' => 'адрес электронной почты',
            'phone_number' => 'номер телефона',
        ];

        // $data = array($labels, $names);
        return view('forms.client')->with('data', $data); 
    }
}
