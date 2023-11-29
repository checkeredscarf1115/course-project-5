@extends('my_form')

@section('blank')
    <form class="p-5" method="POST" action="{{ route('insert_client') }}">
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
                    <button type="submit" class="btn btn-primary">{{ __('Создать') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
