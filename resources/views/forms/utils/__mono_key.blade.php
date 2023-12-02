@extends('my_form')

@section('blank')
    <form class="p-5" method="POST" action="{{ route($route_insert) }}">
        @csrf

        @if(session()->has('message'))
            <div class="alert {{ session()->get('class') }}">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="container">
            <div class="row row-flex" style='display: flex; flex-wrap: wrap;'>
                @for ($i = 0; $i < count($data['block_names']); $i++)
                    @if (count($data['block_names']) < 3)
                        <div class="col-xl-6 col-sm-12 col-xs-12">
                    @else
                        <div class="col-xl-4 col-sm-12 col-xs-12">
                    @endif
                        <h3>{{ $data['block_names'][$i] }}</h3>
                        @foreach ($data['blocks'][$i] as $key => $value)
                            @include('forms.utils.lbl-inp')
                        @endforeach
                    </div>
                @endfor
            </div>

            <div class="row mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" id="post">{{ __('Создать') }}</button>
                </div>
            </div>

            {{-- <div class="row mt-4">
                <div class="col-auto">
                    @include('forms.utils.lbl-inp', ['key' => array_keys($data['id'])[0], 'value' => array_values($data['id'])[0]])
                    <div class="mt-3"></div>
                    <button type="submit" formmethod="put" class="btn btn-primary" id="put">{{ __('Изменить') }}</button>
                    <button type="submit" formmethod="delete" class="btn btn-primary" id="delete">{{ __('Удалить') }}</button>
                </div>
            </div> --}}

        </div>
    </form>
@endsection
