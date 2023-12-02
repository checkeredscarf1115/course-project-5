<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;

class __ModelController extends Controller
{
    protected $data;
    protected $form;
    protected $search;
    protected $query;
    protected $route_insert;

    public function __construct() {
        $this->data = [];
        $this->form = 'main';
        $this->search = 'main';
        $this->query = null;
        $this->route_insert = 'main';
    }

    public function show(): View {
        return view($this->form)->with('data', $this->data)->with('route_insert', $this->route_insert);
    }

    public function search(Request $request): View {
        $this->data['search'] = [];
        if ($this->query != null) {
            foreach ($request->all() as $key => $value) {
                if ($value != "") {
                    $this->query = $this->query->where($key, 'like', '%' . $value . '%');
                    
                }

                if ($key === array_key_last($request->all())) {
                    $this->data['search'] = $this->query->get();
                }
            }

        }
        
        return view($this->search)->with('data', $this->data); 
    }

    public function getMessage($message, $class) {
        return redirect()->back()->with('message',"$message")
                                 ->with('class',"$class")
                                 ;
    }

    public function insertWithModel($model, Request $request) {
        foreach ($request->all() as $key => $value) {
            if (array_key_exists('id', $this->data) && array_key_exists($key, $this->data['id'])) {
            }
            else if ($value == "") {
                return __ModelController::getMessage("Необходимо заполнить все поля перед созданием", "alert-warning");
            }
        }

        $arr = [];
        foreach ($request->except('_token') as $key => $value) {
            $arr[$key] = $value;
        }
        $model->fill($arr);

        try {
            $model->save();
        } catch (QueryException $ex) {
            return __ModelController::getMessage("Ошибка при добавлении записи", "alert-danger");
        }

        return __ModelController::getMessage("Запись успешно добавлена", "alert-success");
    }
}
