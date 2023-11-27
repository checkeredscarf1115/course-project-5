@extends('my_form')

@section('blank')
    <form class="p-5" method="POST">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < count($data['blocks']); $i++)
                    <div class="col-xl-4 col-sm-12 col-xs-12">
                        <h3>{{ $data['block_names'][$i] }}</h3>
                        @foreach ($data['blocks'][$i] as $key => $value)
                            @include('forms.utils.lbl-inp')
                        @endforeach
                    </div>
                @endfor
            </div>
            <div class="row mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
