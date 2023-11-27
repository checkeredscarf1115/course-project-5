<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;

class CourseController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Course::query();

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
}
