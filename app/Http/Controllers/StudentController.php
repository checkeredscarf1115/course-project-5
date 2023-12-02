<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\__ModelController;
use App\Models\Student;

class StudentController extends __ModelController
{
    public function __construct() {
        // $this->form = 'forms.applicant';
        $this->form = 'forms.utils.__composite_key';
        $this->search = 'forms.utils.__search_template';
        $this->query = Student::query();
        $this->route_insert = 'insert_student';

        $this->data['blocks'] = Array (
            0 => Array (
                'номер_клиента' => 'id клиента',
            ),

            1 => Array (
                'номер_курса' => 'id курса',
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

    public function insert(Request $request) {
        $model = new Student;
        return __ModelController::insertWithModel($model, $request);
    }
}
