@extends('my_form')

@section('blank')
    <form class="p-5">
        <div class="container">
            <div class="row">
                {{-- @for ($d = 0; $i < count($data[0]); $i++)
                    @php
                        $label = $data[0][$i];
                        $name = $data[1][$i];
                    @endphp
                        <div class="col-auto" style="">
                    @include('forms.utils.lbl-inp')
                </div>
                @endfor --}}
                <div class="col-xl-4 col-sm-12 col-xs-12">
                    <h3>Персональные данные</h3>
                    @foreach ($data['personal_data'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                </div>
                <div class="col-xl-4 col-sm-12 col-xs-12">
                    <h3>Профессиональный путь</h3>
                    @foreach ($data['professional_background'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                </div>
                <div class="col-xl-4 col-sm-12 col-xs-12">
                    <h3>Контактная информация</h3>
                    @foreach ($data['contact'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-auto">
                    <button type="submit" name="create_client" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
