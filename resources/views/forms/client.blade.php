@extends('my_form')

@section('blank')
    <form class="p-5">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < count($data[0]); $i++)
                    @php
                        $label = $data[0][$i];
                        $name = $data[1][$i];
                    @endphp
                    <div class="col-auto" style="">
                        
                    @include('forms.utils.lbl-inp')
                </div>
                @endfor
            </div>
        </div>
    </form>
@endsection
