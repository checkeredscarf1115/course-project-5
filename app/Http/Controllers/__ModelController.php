<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
}
