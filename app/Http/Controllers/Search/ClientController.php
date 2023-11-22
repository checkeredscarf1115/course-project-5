<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientController extends Controller
{
    public function show(): View {
        $data = [];
        $data['personal_data'] = [
            'full_name' => 'ФИО',
            'sex' => 'пол',
            'birthdate' => 'дата рождения',
            'birthplace' => 'место рождения',
            'residence' => 'место жительства',
            'martial_status' => 'семейное положение',
        ];
        $data['professional_background'] = [
            'education' => 'образование',
            'profession' => 'профессия',
            'previous_workplace' => 'последнее место работы',
            'previous_job_title' => 'последняя должность',
            'requirements' => 'требования к работе',
        ];
        $data['contact'] = [
            'email' => 'адрес электронной почты',
            'phone_number' => 'номер телефона',
        ];


        // $da['client'] = (array)DB::connection('sqlsrv')->table('Клиент')->first();
        $data['client'] = Client::firstOrFail();
        // $data = array($labels, $names);
        return view('search.client')->with('data', $data); 
    }
}
