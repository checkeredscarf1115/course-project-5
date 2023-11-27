<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Applicant;

class ApplicantController extends __ModelController
{
    public function __construct() {
        // $this->form = 'forms.applicant';
        $this->form = 'forms.utils.__composite_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Applicant::query();

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
}
