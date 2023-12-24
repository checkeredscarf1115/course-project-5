<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;
use App\Models\ViewCourse;

class CourseController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->route_insert = 'insert_course';

        $this->data['id'] = ['номер_курса' => 'номер курса'];

        $this->data['block_names'] = [
            'Описание курса',
            'Сроки',
        ];

        $this->data['blocks'] = [
            0 => Array(
                'номер_ОУ' => 'номер образовательного учреждения',
                'профессия' => 'профессия',
                'часы_обучения' => 'часы обучения',
                'форма_обучения' => 'форма обучения',
                'требования_к_образованию' => 'требования к образованию',
            ),
            1 => Array(
                'дата_начала_обучения' => 'дата начала обучения',
                'дата_окончания_обучения' => 'дата окончания обучения',
                'статус' => 'статус',
            ),
        ];
    }

    public function insert(Request $request) {
        $currentDate = date('Y-m-d');
        if ($request->дата_начала_обучения < $currentDate) {
            return __ModelController::getMessage("Дата начала обучения не может быть ниже текущей", "alert-danger");
        }
        
        if ($request->дата_окончания_обучения <= $request->дата_начала_обучения) {
            return __ModelController::getMessage("Дата окончания обучения не может быть равна или ниже даты начала обучения", "alert-danger");
        }

        $model = new Course;
        return __ModelController::changeRecordState($model, $request);
    }

    public function search(Request $request) {
        $model = new ViewCourse;
        return __ModelController::searchWithQuery($model, $request);
    }
}
