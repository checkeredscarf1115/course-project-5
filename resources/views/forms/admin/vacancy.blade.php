@extends('my_form')

@section('blank')
    <form class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-12 col-xs-12">
                    <h3>Информация о работе</h3>
                    @foreach ($data['company'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                </div>
                <div class="col-xl-4 col-sm-12 col-xs-12">
                    <h3>Сроки</h3>
                    @foreach ($data['period'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-auto">
                    <button type="submit" name="create_vacancy" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
