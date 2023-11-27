<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Vacancy;

class VacancyController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Vacancy::query();



        $this->data['id'] = ['номер_вакансии' => 'номер вакансии'];

        $this->data['block_names'] = [
            'Описание компании',
            'Сроки',
        ];

        $this->data['blocks'] = [
            0 => Array(
                'ИНН_компании' => 'ИНН компании',
                'должность' => 'должность',
                'обязанности' => 'обязанности',
                'требования' => 'требования',
                'условия' => 'условия',
            ),
            1 => Array(
                'статус' => 'статус',
                'дата_открытия' => 'дата открытия',
                'дата_закрытия' => 'дата закрытия',
            ),
        ];
    }
}
