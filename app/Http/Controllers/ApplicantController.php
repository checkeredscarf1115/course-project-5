<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Applicant;

class ApplicantController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.applicant';
        $this->search = 'main';
        $this->query = Applicant::query();

        $this->data['client_searchables'] = [
            'id_клиента' => 'id клиента',
            // 'номер_телефона' => 'номер телефона',
            // 'адрес_электронной_почты' => 'адрес электронной почты',
        ];

        $this->data['vacancy_searchables'] = [
            'id_вакансии' => 'id вакансии',
        ];
        $this->data['status'] = [
            'статус' => 'статус',
        ];
        $this->data['status_values'] = [
            "выслано", "принято", 'отказ',
        ];
    }
}
