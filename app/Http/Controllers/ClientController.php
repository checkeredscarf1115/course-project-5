<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;

class ClientController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.client';
        $this->search = 'search.client';
        $this->query = Client::query();

        $this->data['id'] = ['номер_клиента' => 'номер_клиента'];
        $this->data['personal_data'] = [
            'ФИО' => 'ФИО',
            'пол' => 'пол',
            'дата_рождения' => 'дата рождения',
            'место_рождения' => 'место рождения',
            'место_жительства' => 'место жительства',
            'семейное_положение' => 'семейное положение',
        ];
        $this->data['professional_background'] = [
            'образование' => 'образование',
            'профессия' => 'профессия',
            'последнее_место_работы' => 'последнее место работы',
            'последняя_должность' => 'последняя должность',
            'требования_к_работе' => 'требования к работе',
        ];
        $this->data['contact'] = [
            'адрес_электронной_почты' => 'адрес электронной почты',
            'номер_телефона' => 'номер телефона',
        ];
    }
}