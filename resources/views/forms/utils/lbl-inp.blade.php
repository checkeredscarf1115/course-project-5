    <label class="mt-2 w-100" for="{{ $key }}">{{ $value }}</label>
    <br>
@if (preg_match('/дата/', $key) ||  preg_match('/день/', $key))
    <input class="w-100" type="date" name="{{ $key }}" value="{{ old($key, date('Y-m-d')) }}" id="{{ $key }}">
@elseif (preg_match('/образов/', $key))
    <select class="w-100 form-select" name="{{ $key }}" value="{{ old($key) }}" id="{{ $key }}">
        <option value="основное обшее">основное обшее</option>
        <option value="среднее общее">среднее общее</option>
        <option value="среднее проф">среднее проф</option>
        <option value="бакалавриат">бакалавриат</option>
        <option value="специалитет">специалитет</option>
        <option value="магистратура">магистратура</option>
        <option value="высшая квалификация">высшая квалификация</option>
    </select>
@elseif (preg_match('/статус курса/', $value))
    <select class="w-100 form-select" name="{{ $key }}" value="{{ old($key) }}" id="{{ $key }}">
        <option value="приём">приём</option>
        <option value="в процессе">в процессе</option>
        <option value="завершён">завершён</option>
    </select>
@elseif (preg_match('/статус вакансии/', $value))
    <select class="w-100 form-select" name="{{ $key }}" value="{{ old($key) }}" id="{{ $key }}">
        <option value="открыта">открыта</option>
        <option value="закрыта">закрыта</option>
    </select>
@else
    <input class="w-100" type="text" name="{{ $key }}" value="{{ old($key) }}" id="{{ $key }}">
@endif
<br>