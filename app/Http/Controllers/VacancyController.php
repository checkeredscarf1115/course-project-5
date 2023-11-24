<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VacancyController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.admin.vacancy';
        $this->search = 'search.vacancy';
        // $this->query = Client::query();

        $this->data = [];
        $this->data['company'] = [
            'EIN' => 'ИНН компании',
            'job_title' => 'должность',
            'responsibilities' => 'обязанности',
            'requirements' => 'требования',
            'conditions' => 'условия',
        ];
        $this->data['period'] = [
            'status' => 'статус',
            'create_date' => 'дата открытия',
            'close_date' => 'дата закрытия',
        ];
    }
}
