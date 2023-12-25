<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\ViewClient;
use DateTime;

class ClientController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
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
        $currentDate = new DateTime(date('Y-m-d'));
        $birthdate = new DateTime($request->дата_рождения);        
        if ($birthdate->diff($currentDate)->y < 18) {
            return __ModelController::getMessage("Возраст должен быть не ниже 18 лет", "alert-danger");
        }

        if ($request->пол == 'ж') {
            $ms = $request->семейное_положение;
            if ($ms == 'холост' || $ms == 'женат' || $ms == 'разведён' || $ms == 'вдовец')
            return __ModelController::getMessage("Семейное положение должно соответствовать полу", "alert-danger");
        }

        else if ($request->пол == 'м') {
            $ms = $request->семейное_положение;
            if ($ms == 'холоста' || $ms == 'замужем' || $ms == 'разведена' || $ms == 'вдова')
            return __ModelController::getMessage("Семейное положение должно соответствовать полу", "alert-danger");
        }

        $model = new Client;
        // $model = __ModelController::setConnection($model);
        return __ModelController::changeRecordState($model, $request);
    }

    public function search(Request $request) {
        $model = new ViewClient;
        // $model = __ModelController::setConnection($model);
        return __ModelController::searchWithQuery($model, $request);
    }
}
