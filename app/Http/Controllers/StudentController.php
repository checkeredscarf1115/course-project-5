<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Student;

class StudentController extends __ModelController
{
    public function __construct() {
        // $this->form = 'forms.applicant';
        $this->form = 'forms.utils.__composite_key';
        $this->search = 'main';
        $this->query = Student::query();

        $this->data['searchables'] = Array (
            0 => Array (
                'id_клиента' => 'id клиента',
            ),

            1 => Array (
                'id_курса' => 'id курса',
            ),
        );
        $this->data['routes'] = ['search_client', 'search_course'];
        
        $this->data['status'] = [
            'статус' => 'статус',
        ];
        $this->data['status_values'] = [
            "принят", "учится", 'отчислен', 'завершил'
        ];
    }
}
