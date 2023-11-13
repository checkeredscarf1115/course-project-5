@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" >
    <div class="col-auto">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#record-collapse" aria-expanded="false">
              <x-fas-greater-than style="height: 12px"/> Запись
          </button>
          <div class="collapse" id="record-collapse" style="">
            <ul class="">
              <li><a href="#" class="link-dark rounded">Клиент</a></li>
              <li><a href="#" class="link-dark rounded">Соискатель</a></li>
              <li><a href="#" class="link-dark rounded">Обучающийся</a></li>
            </ul>
          </div>
        </li>
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#search-collapse" aria-expanded="false">
              <x-fas-greater-than style="height: 12px"/> Поиск
          </button>
          <div class="collapse" id="search-collapse" style="">
            <ul class="">
              <li><a href="#" class="link-dark rounded">Клиент</a></li>
              <li><a href="#" class="link-dark rounded">Соискатель</a></li>
              <li><a href="#" class="link-dark rounded">Обучающийся</a></li>
            </ul>
          </div>
        </li>
        
      </ul>
    </div>
    <div class="col bg-white" style="min-height: 80vh">
      @yield('form_blank')
    </div>
  </div>
 
</div>
@endsection
