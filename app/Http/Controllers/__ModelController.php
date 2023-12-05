<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class __ModelController extends Controller
{
    protected $data;
    protected $form;
    protected $search;
    protected $route_insert;
    protected $route_update;
    protected $route_delete;

    public function __construct() {
        $this->data = [];
        $this->form = 'main';
        $this->search = 'main';
        $this->route_insert = 'main';
        $this->route_update = 'main';
        $this->route_delete = 'main';
    }

    public function setConnection($model) {
        DB::purge('sqlsrv');

        config(['database.connections.sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_SQLSRV', 'localhost'),
            'port' => env('DB_PORT_SQLSRV', '1433'),
            'database' => env('DB_DATABASE_SQLSRV', 'forge'),
            'username' => Auth::user()->email,
            'password' => Auth::user()->name,
        ]]);

        // DB::connection('sqlsrv');
        // DB::reconnect('sqlsrv');
        $model->setConnection('sqlsrv');
        return $model;
    }

    public function show(): View {
        $this->data['route_insert'] = $this->route_insert;
        $this->data['route_update'] = $this->route_update;
        $this->data['route_delete'] = $this->route_delete;

        return view($this->form)->with('data', $this->data);
    }

    public function searchWithQuery($model, Request $request) {
        $model = __ModelController::setConnection($model);
        $query = $model->query();

        $this->data['search'] = [];
        if ($query != null) {
            foreach ($request->all() as $key => $value) {
                if ($value != "") {
                    $query = $query->where($key, 'like', '%' . $value . '%');
                }

                try {
                    if ($key === array_key_last($request->all())) {
                        $this->data['search'] = $query->get();
                    }
                } catch (QueryException $ex) {
                    $this->data['search_error'] = $ex->getMessage();
                    return view($this->search)->with('data', $this->data); 
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

    public function changeRecordState($model, Request $request) {
        $model = __ModelController::setConnection($model);

        if ($request->submit == "insert") {
            return $this->insertWithModel($model, $request);
        }
        else if ($request->submit == "update") {
            return $this->update($model->query(), $request);
        }
        else if ($request->submit == "delete") {
            return $this->delete($model->query(), $request);
        }
        
        return $this->getMessage("Found nothing", "alert-danger");
    }

    public function insertWithModel($model, Request $request) {
        foreach ($request->all() as $key => $value) {
            if (array_key_exists('id', $this->data) && array_key_exists($key, $this->data['id'])) {
            }
            else if ($value == "") {
                return $this->getMessage("Необходимо заполнить все поля перед созданием", "alert-warning");
            }
        }

        // $arr = [];
        foreach ($request->except(['_token', 'submit']) as $key => $value) {
            // $arr[$key] = $value;
            $model->$key = $value;
            // $arr[$key] = $model->$key;
        }
        // $model->fill($arr);

        try {
            $model->save();
        } catch (QueryException $ex) {
            // return $this->getMessage("Ошибка при добавлении записи", "alert-danger");
            // return $this->getMessage(implode('\n', $arr), "alert-danger");
            return $this->getMessage($ex->getMessage(), "alert-danger"); 
        }

        return $this->getMessage("Запись успешно добавлена", "alert-success");
    }

    public function update($query, Request $request) {
        $arr = [];
        foreach ($request->all() as $key => $value) {
            if (array_key_exists('id', $this->data) && array_key_exists($key, $this->data['id'])) {
                if ($value == "") {
                    return $this->getMessage("Необходимо заполнить поле с идентификатором", "alert-warning");
                }
                else {
                    $arr[$key] = $value;
                }
            }
            else if (!array_key_exists('id', $this->data)) {
                if (array_key_exists($key, $this->data['blocks'][0]) || array_key_exists($key, $this->data['blocks'][1])) {
                    if ($value == "" && !(array_key_exists($key, $this->data['status']))) {
                        return $this->getMessage("Необходимо заполнить поле с идентификаторами", "alert-warning");
                    }
                    else {
                        $arr[$key] = $value;
                    }
                }
            }
        }

        $m = $query;
        if ($m != null) {
            foreach ($arr as $key => $value) {
                $m = $m->where($key, 'like', '%' . $value . '%');
            }
        }

        $m = $m->first();
        if ($m === null) {
            return $this->getMessage("Не существует такой записи", "alert-warning");
        }

        foreach ($request->except(['_token', 'submit']) as $key => $value) {
            if ($value != '') {
                $m->$key = $value;
            }
            
        }

        try {
            $m->save();
        } catch (QueryException $ex) {
            // return $this->getMessage("Ошибка при изменении записи", "alert-danger");
            // return $this->getMessage(implode('\n', $m->toArray()), "alert-danger");  
            return $this->getMessage($ex->getMessage(), "alert-danger");  
        }

        // return $this->getMessage(implode('\n', $m->toArray()), "alert-success");
        return $this->getMessage("Запись успешно изменена", "alert-success");
    }

    public function delete($query, Request $request) {
        $arr = [];
        foreach ($request->all() as $key => $value) {
            if (array_key_exists('id', $this->data) && array_key_exists($key, $this->data['id'])) {
                if ($value == "") {
                    return $this->getMessage("Необходимо заполнить поле с идентификатором", "alert-warning");
                }
                else {
                    $arr[$key] = $value;
                }
            }
            else if (!array_key_exists('id', $this->data)) {
                if (array_key_exists($key, $this->data['blocks'][0]) || array_key_exists($key, $this->data['blocks'][1])) {
                    if ($value == "" && !(array_key_exists($key, $this->data['status']))) {
                        return $this->getMessage("Необходимо заполнить поле с идентификаторами", "alert-warning");
                    }
                    else {
                        $arr[$key] = $value;
                    }
                }
            }
        }

        $m = $query;
        if ($m != null) {
            foreach ($arr as $key => $value) {
                $m = $m->where($key, 'like', '%' . $value . '%');
            }
        }

        $m = $m->first();
        if ($m === null) {
            return $this->getMessage("Не существует такой записи", "alert-warning");
        }

        try {
            $m->delete();
        } catch (QueryException $ex) {
            // return $this->getMessage("Ошибка при изменении записи", "alert-danger");
            // return $this->getMessage(implode('\n', $m->toArray()), "alert-danger");  
            return $this->getMessage($ex->getMessage(), "alert-danger");  
        }

        // return $this->getMessage(implode('\n', $m->toArray()), "alert-success");
        return $this->getMessage("Запись успешно изменена", "alert-success");
    }
}
