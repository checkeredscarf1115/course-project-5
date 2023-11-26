@extends('my_form')

@section('blank')
    <form class="p-5" >
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        @foreach ($data['client_searchables'] as $key => $value)
                            @include('forms.utils.lbl-search-inp')
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('search_client') }}" target=”_blank” class="btn btn-primary" id="search_client">{{ __('Найти') }}</a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($data['vacancy_searchables'] as $key => $value)
                            @include('forms.utils.lbl-search-inp')
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('search_vacancy') }}" target=”_blank” class="btn btn-primary" id="search_vacancy">{{ __('Найти') }}</a>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-auto">
                            <select class="form-select" id="status_select"></select>
                            <script>
                                let statusSelect = document.querySelector("#status_select");
                                ({!! json_encode($data['status_values'], JSON_HEX_TAG) !!}).forEach((element) => {
                                    let option = document.createElement("option");
                                    option.value = element;
                                    option.text = element;
                                    statusSelect.add(option);
                                });
                            </script> 
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-auto" onload="setStatus()">
                            <button type="submit" name="create_applicant" class="btn btn-primary" id="create_applicant">{{ __('Добавить') }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
@endsection
