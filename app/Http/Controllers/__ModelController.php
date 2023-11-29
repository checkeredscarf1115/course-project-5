<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class __ModelController extends Controller
{
    protected $data;
    protected $form;
    protected $search;
    protected $query;

    public function __construct() {
        $this->data = [];
        $this->form = 'my_form';
        $this->search = 'my_form';
        $this->query = null;
    }

    public function show(): View {
        return view($this->form)->with('data', $this->data);
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
                                 ->with('class',"$class");
    }

    public function insertWithModel($model, Request $request) {
        foreach ($request->all() as $key => $value) {
            if ($value == "") {
                return __ModelController::getMessage("Необходимо заполнить все поля перед созданием", "alert-warning");
            }
        }

        foreach ($request->all() as $key => $value) {
            if ($key != '_token')
                $model->$key = $request->$key;
        }
 
        try {
            $model->save();
        } catch (QueryException $ex) {
            return __ModelController::getMessage("Ошибка при добавлении записи", "alert-danger");
        }

        return __ModelController::getMessage("Запись успешно добавлена", "alert-success");
    }
}
