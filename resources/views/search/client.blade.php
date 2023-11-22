@extends('my_form')

@section('blank')
    <form class="p-5" action='?lala' method='get'>
        <div class="container">
            <div class="row">
                <div class="col-2" id='menu'>
                    @foreach ($data['personal_data'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                    @foreach ($data['professional_background'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                    @foreach ($data['contact'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
                    <div class="col-auto mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('Найти') }}</button>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="container ">
                        @php echo $data['client']->номер_клиента @endphp
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection