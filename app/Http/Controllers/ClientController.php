<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;

class ClientController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Client::query();
        $this->route_insert = 'insert_client';

        $this->data['id'] = ['номер_клиента' => 'номер клиента'];

        $this->data['block_names'] = [
            'Персональные данные',
            'Профессиональный путь',
            'Контактная информация',
        ];

        $this->data['blocks'] = [
            0 => Array(
                'ФИО' => 'ФИО',
                'пол' => 'пол',
                'дата_рождения' => 'дата рождения',
                'место_рождения' => 'место рождения',
                'место_жительства' => 'место жительства',
                'семейное_положение' => 'семейное положение',
            ),
            1 => Array(
                'образование' => 'образование',
                'профессия' => 'профессия',
                'последнее_место_работы' => 'последнее место работы',
                'последняя_должность' => 'последняя должность',
                'требования_к_работе' => 'требования к работе',
            ),
            2 => Array(
                'адрес_электронной_почты' => 'адрес электронной почты',
                'номер_телефона' => 'номер телефона',
            ),

            // 3 => Array(
            //     'номер_клиента' => 'номер_клиента',
            // )
        ];
    }

    public function insert(Request $request) {
        $model = new Client;
        return __ModelController::changeRecordState($model, $request);
    }
}
