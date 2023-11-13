@extends('my_form')

@section('blank')
    <form class="p-5">
        <div class="container">
            <div class="row">
                {{-- @for ($i = 0; $i < count($data[0]); $i++)
                    @php
                        $label = $data[0][$i];
                        $name = $data[1][$i];
                    @endphp
                    <div class="col-auto" style="">
                        
                    @include('forms.utils.lbl-inp')
                </div>
                @endfor --}}
                <div class="container">
                    <div class="row">
                        @foreach ($data['client_searchables'] as $key => $value)
                            @include('forms.utils.lbl-search-inp')
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <button class="btn btn-primary" id="find_client">Найти</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="bg-light text-muted border border-light" type="text" id="country" value="data" readonly>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($data['vacancy_searchables'] as $key => $value)
                            @include('forms.utils.lbl-search-inp')
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <button class="btn btn-primary" id="find_client">Найти</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="bg-light text-muted border border-light" type="text" id="country" value="data" readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-auto">
                            <button class="btn btn-primary" id="add_applicant">Добавить</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
@endsection
