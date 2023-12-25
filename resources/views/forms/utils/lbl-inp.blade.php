    <label class="mt-2 w-100" for="{{ $key }}">{{ $value }}</label>
    <br>
@if (preg_match('/дата/', $key) ||  preg_match('/день/', $key))
    <input class="w-100" type="date" name="{{ $key }}" value="{{ old($key, date('Y-m-d')) }}" id="{{ $key }}">
@elseif (preg_match('/образов/', $key))
    <select class="w-100 form-select" name="{{ $key }}" id="{{ $key }}">
        <option value="основное общее" @if (old($key) == 'основное общее') selected="selected" @endif>основное общее</option>
        <option value="среднее общее" @if (old($key) == 'среднее общее') selected="selected" @endif>среднее общее</option>
        <option value="среднее проф" @if (old($key) == 'среднее проф') selected="selected" @endif>среднее проф</option>
        <option value="бакалавриат" @if (old($key) == 'бакалавриат') selected="selected" @endif>бакалавриат</option>
        <option value="специалитет" @if (old($key) == 'специалитет') selected="selected" @endif>специалитет</option>
        <option value="магистратура" @if (old($key) == 'магистратура') selected="selected" @endif>магистратура</option>
        <option value="высшая квалификация" @if (old($key) == 'высшая квалификация') selected="selected" @endif>высшая квалификация</option>
    </select>
@elseif (preg_match('/статус курса/', $value))
    <select class="w-100 form-select" name="{{ $key }}" id="{{ $key }}">
        <option value="приём" @if (old($key) == 'приём') selected="selected" @endif>приём</option>
        <option value="в процессе" @if (old($key) == 'в процессе') selected="selected" @endif>в процессе</option>
        <option value="завершён" @if (old($key) == 'завершён') selected="selected" @endif>завершён</option>
    </select>
@elseif (preg_match('/статус вакансии/', $value))
    <select class="w-100 form-select" name="{{ $key }}" id="{{ $key }}">
        <option value="открыта" @if (old($key) == 'открыта') selected="selected" @endif>открыта</option>
        <option value="закрыта" @if (old($key) == 'закрыта') selected="selected" @endif>закрыта</option>
    </select>
@else
    <input class="w-100" type="text" name="{{ $key }}" value="{{ old($key) }}" id="{{ $key }}">
@endif
<br>