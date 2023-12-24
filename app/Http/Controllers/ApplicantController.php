<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Applicant;
use App\Models\ViewApplicant;

class ApplicantController extends __ModelController
{
    public function __construct() {
        // $this->form = 'forms.applicant';
        $this->form = 'forms.utils.__composite_key';
        $this->search = 'forms.utils.__search_template';
        $this->route_insert = 'insert_applicant';

        $this->data['blocks'] = Array (
            0 => Array (
                'номер_клиента' => 'id клиента',
            ),

            1 => Array (
                'номер_вакансии' => 'id вакансии',
            ),
        );
        $this->data['routes'] = ['search_client', 'search_vacancy'];
        
        $this->data['status'] = [
            'статус_предложения' => 'статус',
        ];
        $this->data['status_values'] = [
            "выслано", "принято", 'отказ',
        ];
    }

    public function insert(Request $request) {
        $model = new Applicant;
        return __ModelController::changeRecordState($model, $request);
    }

    public function search(Request $request) {
        $model = new ViewApplicant;
        return __ModelController::searchWithQuery($model, $request);
    }
}
