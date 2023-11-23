<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientController extends Controller
{
    public function show(Request $request): View {
        $data = [];
        $data['id'] = ['номер_клиента' => 'номер_клиента'];
        $data['personal_data'] = [
            'ФИО' => 'ФИО',
            'пол' => 'пол',
            'дата_рождения' => 'дата рождения',
            'место_рождения' => 'место рождения',
            'место_жительства' => 'место жительства',
            'семейное_положение' => 'семейное положение',
        ];
        $data['professional_background'] = [
            'образование' => 'образование',
            'профессия' => 'профессия',
            'последнее_место_работы' => 'последнее место работы',
            'последняя_должность' => 'последняя должность',
            'требования_к_работе' => 'требования к работе',
        ];
        $data['contact'] = [
            'адрес_электронной_почты' => 'адрес электронной почты',
            'номер_телефона' => 'номер телефона',
        ];

        // $da['client'] = (array)DB::connection('sqlsrv')->table('Клиент')->first();

        $query = Client::query();
        foreach ($request->all() as $key => $value) {
            if ($value != "") {
                $query = $query->where($key, 'like', '%' . $value . '%')->get();
            }
        }

        if (isset($query))
            $data['client'] = $query;
        
        // $data['client'] = Client::find(546);
        
        
        // $data = array($labels, $names);
        return view('search.client')->with('data', $data); 
    }
}
