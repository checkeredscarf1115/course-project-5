<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Institution;

class InstitutionController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Institution::query();

        $this->data['id'] = ['номер_ОУ' => 'номер образовательного учреждения'];

        $this->data['block_names'] = [
            'Информация об обр. учреждении',
            'Контактная информация',
        ];

        $this->data['blocks'] = [
            0 => Array(
                'название_оу' => 'название образовательного учреждения',
                'адрес_оу' => 'адрес образовательного учреждения',
            ),
            1 => Array(
                'адрес_электронной_почты_оу' => 'адрес электронной почты',
                'телефон_оу' => 'номер телефона',
            ),
        ];
    }

    public function insert(Request $request) {
        $model = new Institution;
        return __ModelController::insertWithModel($model, $request);
    }
}
