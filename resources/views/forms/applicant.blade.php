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
                            <button type="submit" name="search_client" class="btn btn-primary" id="search_client">{{ __('Найти') }}</button>
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
                            <button type="submit" name="search_vacancy" class="btn btn-primary" id="search_vacancy">{{ __('Найти') }}</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="bg-light text-muted border border-light" type="text" id="country" value="data" readonly>
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
