<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientController extends Controller
{
    private $data;
    public function __construct() {
        $this->data = [];
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

    public function show(): View {
        return view('forms.client')->with('data', $this->data); 
    }

    public function search(Request $request): View {
        $query = Client::query();
        foreach ($request->all() as $key => $value) {
            if ($value != "") {
                $query = $query->where($key, 'like', '%' . $value . '%');
                
            }

            if ($key === array_key_last($request->all())) {
                $this->data['client'] = $query->get();
            }
        }
        
        return view('search.client')->with('data', $this->data); 
    }
}
