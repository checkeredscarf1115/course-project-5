
<label class="mt-2 w-100" for="{{ $key }}">{{ $value }}</label>
<br>
<input class="w-100" type="text" name="{{ $key }}" value="{{ request()->input($key) }}" id="{{ $key }}">
<br>