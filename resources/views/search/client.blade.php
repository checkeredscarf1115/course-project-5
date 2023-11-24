@extends('my_form')

@section('blank')
    <form class="" action='' method='get'>
        <div class="container">
            <div class="row">
                <div class="col-2 vh-100" id='menu'>
                    @foreach ($data['id'] as $key => $value)
                        @include('forms.utils.lbl-inp')
                    @endforeach
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
                    <div class="container scrollable vh-100">           
                            @if (isset($data['client'])) 
                                @foreach ($data['client'] as $d)
                                    <div class="row">
                                        @php $col_count = 0 @endphp
                                        @foreach ($d->getAttributes() as $key => $value)
                                            @if ($col_count == 0)
                                                <div class="col">
                                             @endif
                                            <div class="row">
                                                {{ $value }}
                                            </div>
                                            @php $col_count += 1; @endphp

                                            @if ($col_count % 3 == 2)
                                                @php $col_count = 0; @endphp
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif
                        
                        {{-- @php echo $data['client']->номер_клиента @endphp --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
