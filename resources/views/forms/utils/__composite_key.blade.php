@extends('my_form')

@section('blank')
    <form class="p-5" method="POST" >
        @csrf

        @if(session()->has('message'))
            <div class="alert {{ session()->get('class') }}">
                {{ session()->get('message') }}
            </div>
        @endif
        
        <div class="container">
            <div class="row">
                <div class="container">
                    @for ($i = 0; $i < count($data['blocks']); $i++)
                        <div class="row">
                            @foreach ($data['blocks'][$i] as $key => $value)
                                @include('forms.utils.lbl-inp')
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <a href="{{ route($data['routes'][$i]) }}" target=”_blank” class="btn btn-primary" id="search_vacancy">{{ __('Найти') }}</a>
                            </div>
                        </div>
                    @endfor
                    
                    {{-- <div class="row my-4">
                        <div class="col-auto">
                            <select name="{{ key($data['status']) }}" class="form-select" id="{{ key($data['status']) }}"></select>
                            <script>
                                let tag = ({!! json_encode($data['status']) !!});
                                let fulltag = '#' + Object.keys(tag)[0];
                                let statusSelect = document.querySelector(fulltag);
                                ({!! json_encode($data['status_values'], JSON_HEX_TAG) !!}).forEach((element) => {
                                    let option = document.createElement("option");
                                    option.value = element;
                                    option.text = element;
                                    statusSelect.add(option);
                                });
                            </script> 
                        </div>
                    </div> --}}
                    <div class="row my-4">
                        @if (preg_match('/предлож/', key($data['status'])))
                            <select class="w-100 form-select" name="{{ key($data['status']) }}" id="{{ key($data['status']) }}">
                                <option value="выслано" @if (old(key($data['status'])) == 'выслано') selected="selected" @endif>выслано</option>
                                <option value="принято" @if (old(key($data['status'])) == 'принято') selected="selected" @endif>принято</option>
                                <option value="отказ" @if (old(key($data['status'])) == 'отказ') selected="selected" @endif>отказ</option>
                            </select>
                        @elseif (preg_match('/статус/', key($data['status'])))
                            <select class="w-100 form-select" name="{{ key($data['status']) }}" id="{{ key($data['status']) }}">
                                <option value="принят" @if (old(key($data['status'])) == 'принят') selected="selected" @endif>принят</option>
                                <option value="учится" @if (old(key($data['status'])) == 'учится') selected="selected" @endif>учится</option>
                                <option value="отчислен" @if (old(key($data['status'])) == 'отчислен') selected="selected" @endif>отчислен</option>
                                <option value="завершил" @if (old(key($data['status'])) == 'завершил') selected="selected" @endif>завершил</option>
                            </select>
                        @endif
                    </div>

                    <div class="row mt-4">
                        <div class="col-auto">
                            <button type="submit" formaction="{{ route($data['route_insert']) }}" class="btn btn-primary" name="submit" value="insert">{{ __('Создать') }}</button>
                            <button type="submit" formaction="{{ route($data['route_insert']) }}" class="btn btn-primary" name="submit" value="update">{{ __('Изменить') }}</button>
                            <button type="submit" formaction="{{ route($data['route_insert']) }}" class="btn btn-primary" name="submit" value="delete">{{ __('Удалить') }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
@endsection
