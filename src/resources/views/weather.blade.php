@extends('layout')

@section('content')

        <h3 class="mb-4 pb-2 fw-normal">Check the weather forecast</h3>

        
        @yield('forms.search')


        @if(isset($data))
        <div class="card shadow-0 border">
          <div class="card-body p-4">

            <h4 class="mb-1 sfw-normal">New York, US</h4>
            <p class="mb-2">Current temperature: <strong>5.42°C</strong></p>
            <p>Feels like: <strong>4.37°C</strong></p>
            <p>Max: <strong>6.11°C</strong>, Min: <strong>3.89°C</strong></p>

            <div class="d-flex flex-row align-items-center">
              <p class="mb-0 me-4">Scattered Clouds</p>
              <i class="fas fa-cloud fa-3x" style="color: #eee;"></i>
            </div>

          </div>
        </div>
        @endif

@stop