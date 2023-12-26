<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Vacancy;
use App\Models\ViewVacancy;

class VacancyController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->route_insert = 'insert_vacancy';


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
                'статус' => 'статус вакансии',
                'дата_создания' => 'дата создания',
                'дата_закрытия' => 'дата закрытия',
            ),
        ];
    }

    public function insert(Request $request) {
        if (!$request->submit == "delete") {
            $currentDate = date('Y-m-d');
            if ($request->дата_создания < $currentDate) {
                return __ModelController::getMessage("Дата создания не может быть ниже текущей", "alert-danger");
            }
            
            if ($request->дата_закрытия <= $request->дата_создания) {
                return __ModelController::getMessage("Дата закрытия не может быть равна или ниже даты создания", "alert-danger");
            }
        }

        $model = new Vacancy;
        return __ModelController::changeRecordState($model, $request);
    }

    public function search(Request $request) {
        $model = new ViewVacancy;
        return __ModelController::searchWithQuery($model, $request);
    }
}
