@extends('my_form')

@section('blank')
    <form class="" method='get'>
        <div class="container">
            <div class="row">
                <div class="col-2 vh-100" id='menu'>
                    @if (isset($data['id'])) 
                        @foreach ($data['id'] as $key => $value)
                            @include('forms.utils.lbl-inp')
                        @endforeach
                    @endif

                    @foreach ($data['blocks'] as $item)
                        @foreach ($item as $key => $value)
                            @include('forms.utils.lbl-inp')
                        @endforeach 
                    @endforeach

                    @if (isset($data['status'])) 
                    <select name="{{ array_keys($data['status'])[0] }}" class="form-select mt-3" id="status_select">
                        <option value=""></option>
                    </select>
                    <script>
                        let statusSelect = document.querySelector("#status_select");
                        ({!! json_encode($data['status_values'], JSON_HEX_TAG) !!}).forEach((element) => {
                            let option = document.createElement("option");
                            option.value = element;
                            option.text = element;
                            statusSelect.add(option);
                        });
                    </script> 
                    @endif

                    <div class="col-auto mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('Найти') }}</button>
                    </div>
                </div>
                
                <div class="col bg-light">
                    <div class="container scrollable vh-100">           
                            @if (isset($data['search'])) 
                                @foreach ($data['search'] as $d)
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

                                            @if ($col_count % 3 == 2 || $key === array_key_last($d->getAttributes()))
                                                @php $col_count = 0; @endphp
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
