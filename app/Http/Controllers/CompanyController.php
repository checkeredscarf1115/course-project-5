<?php

namespace App\Http\Controllers;

use App\Http\Controllers\__ModelController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Company;
use App\Models\ViewCompany;

class CompanyController extends __ModelController
{
    public function __construct() {
        $this->form = 'forms.utils.__mono_key';
        $this->search = 'forms.utils.__search_template';
        $this->route_insert = 'insert_company';

        $this->data['id'] = ['ИНН_компании' => 'ИНН компании'];

        $this->data['block_names'] = [
            'Информация о компании',
            'Контактная информация',
        ];

        $this->data['blocks'] = [
            0 => Array(
                'название_компании' => 'название компании',
                'направление_деятельности' => 'направление деятельности',
                'адрес_офиса' => 'адрес офиса',
            ),
            1 => Array(
                'адрес_электронной_почты' => 'адрес электронной почты',
                'рабочий_телефон' => 'номер телефона',
            ),
        ];
    }

    public function insert(Request $request) {
        
        // if ($request->ИНН_компании ) {
        //     return __ModelController::getMessage($request->ИНН_компании, "alert-danger");
        // }

        $model = new Company;
        return __ModelController::changeRecordState($model, $request);
    }

    public function search(Request $request) {
        $model = new ViewCompany;
        return __ModelController::searchWithQuery($model, $request);
    }
}
