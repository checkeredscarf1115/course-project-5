<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicantController extends Controller
{
    public function show(): View {
        $client_searchables = [];
        $client_labels = [];
        $client_names = [];

        $client_searchables['client_id'] = 'id клиента';
        $client_searchables['client_phone_number'] = 'номер телефона';
        $client_searchables['client_email'] = 'адрес электронной почты';

        $client_labels = ['ФИО', 'пол', 'дата рождения', 'место рождения', 'место жительства', 'семейное положение', 
        'образование', 'профессия', 'последнее место работы', 'последняя должность', 'требования к работе',
        'адрес электронной почты', 'номер телефона'
        ];
        $client_names = ['full_name', 'sex', 'birthdate', 'birthplace', 'residence', 'martial_status', 
        'education', 'profession', 'previous_workplace', 'previous_job_title', 'requirements', 
        'e_address', 'phone_number'
        ];



        $vacancy_searchables = [];
        $vacancy_labels = [];
        $vacancy_names = [];

        $vacancy_searchables['vacancy_id'] = 'id вакансии';
        $vacancy_searchables['job_title'] = 'должность';
        $vacancy_searchables['company_number'] = 'ИНН компании';
        $vacancy_searchables['company_name'] = 'название компании';

        $vacancy_labels = ['ИНН компании', 'должность', 'обязанности', 'требования', 'условия', 'статус', 'дата создания', 'дата закрытия'];
        $vacancy_names = ['company_number', 'job_title', 'responsibilities', 'requirements', 'conditions', 'status', 'create_date', 'close_date'];


        
        $data = array('client_searchables'=>$client_searchables, 'client_labels'=>$client_labels, 'client_names'=>$client_names,
                'vacancy_searchables'=>$vacancy_searchables, 'vacancy_labels'=>$vacancy_labels, 'vacancy_names'=>$vacancy_names);
        return view('forms.applicant')->with('data', $data); 
    }
}
