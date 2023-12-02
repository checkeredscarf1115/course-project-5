{{-- <div class="col-auto right" style="min-width: 200px">
    <label class="mt-2" for="{{ $key }}">{{ $value }}</label>
</div>
<div class="col-auto">
    <input class="" type="text" id="{{ $key }}">
</div> --}}

<div class="col-auto" style="min-width: 200px">
    <label class="mt-2" for="{{ $key }}">{{ $value }}</label>
    <br>
    <input class="" type="text" name="{{ $key }}" id="{{ $key }}">
    <br>
</div>