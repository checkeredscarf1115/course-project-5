@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" >
    <div class="col-auto">
      <ul class="nav nav-pills flex-column mb-auto" style="min-width: 130px">
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#record-collapse" aria-expanded="false">
              <x-fas-greater-than style="height: 12px"/> Запись
          </button>
          <div class="collapse show" id="record-collapse" style="">
            <ul class="">
              <li><a href="{{ route('form_client') }}" class="link-dark rounded">Клиент</a></li>
              <li><a href="{{ route('form_applicant') }}" class="link-dark rounded">Соискатель</a></li>
              <li><a href="{{ route('form_vacancy') }}" class="link-dark rounded">Вакансия</a></li>
              <li><a href="{{ route('form_company') }}" class="link-dark rounded">Компания</a></li>
              <li><a href="{{ route('form_student') }}" class="link-dark rounded">Обучающийся</a></li>
              <li><a href="{{ route('form_course') }}" class="link-dark rounded">Курс</a></li>
              <li><a href="{{ route('form_institution') }}" class="link-dark rounded">Институт</a></li>
            </ul>
          </div>
        </li>
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#search-collapse" aria-expanded="false">
              <x-fas-greater-than style="height: 12px"/> Поиск
          </button>
          <div class="collapse show" id="search-collapse" style="">
            <ul class="">
              <li><a href="{{ route('search_client') }}" class="link-dark rounded">Клиент</a></li>
              <li><a href="{{ route('search_applicant') }}" class="link-dark rounded">Соискатель</a></li>
              <li><a href="{{ route('search_vacancy') }}" class="link-dark rounded">Вакансия</a></li>
              <li><a href="{{ route('search_company') }}" class="link-dark rounded">Компания</a></li>
              <li><a href="{{ route('search_student') }}" class="link-dark rounded">Обучающийся</a></li>
              <li><a href="{{ route('search_course') }}" class="link-dark rounded">Курс</a></li>
              <li><a href="{{ route('search_institution') }}" class="link-dark rounded">Институт</a></li> 
            </ul>
          </div>
        </li>

        @can('Admin')
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#search-collapse" aria-expanded="false">
              <x-fas-greater-than style="height: 12px"/> Прочее
          </button>
          <div class="collapse show" id="search-collapse" style="">
            <ul class="">
              <li><a href="{{ route('register') }}" class="link-dark rounded">Регистрация</a></li>
            </ul>
          </div>
        </li>
        @endcan
        
      </ul>
    </div>
    <div class="col bg-white" style="min-height: 80vh">
      @yield('blank')
    </div>
  </div>
 
</div>
@endsection
