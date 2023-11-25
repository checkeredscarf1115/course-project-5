@extends('my_form')

@section('blank')
    <form class="p-5">
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
                            <button class="btn btn-primary" id="search_vacancy">{{ __('Найти') }}</button>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-auto">
                            <div class="dropdown">
                                <button class="dropbtn">Статус</button>
                                <div class="dropdown-content">
                                  <a href="#">Link 1</a>
                                  <a href="#">Link 2</a>
                                  <a href="#">Link 3</a>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-auto">
                            <button type="submit" name="create_applicant" class="btn btn-primary" id="create_applicant">{{ __('Добавить') }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
@endsection
