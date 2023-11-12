@extends('layouts.app')

@section('content')
<div class="container">
<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed d-inline" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
            <x-fas-greater-than style="height: 12px"/> Создать
        </button>
        <div class="collapse" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed d-inline" data-bs-toggle="collapse" data-bs-target="#ho-collapse" aria-expanded="false">
            <x-fas-greater-than style="height: 12px"/> Поиск
        </button>
        <div class="collapse" id="ho-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div>
      </li>
    </ul>
</div>
@endsection
