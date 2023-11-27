<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Applicant;

class ApplicantController extends __ModelController
{
    public function __construct() {
        // $this->form = 'forms.applicant';
        $this->form = 'forms.utils.__composite_key';
        $this->search = 'main';
        $this->query = Applicant::query();

        $this->data['searchables'] = Array (
            0 => Array (
                'id_клиента' => 'id клиента',
            ),

            1 => Array (
                'id_вакансии' => 'id вакансии',
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
