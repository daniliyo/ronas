@extends('layout')

@section('content')

        

        
        @yield('forms.search')


        @if(isset($weather))
        <div class="card shadow-0 border">
          <div class="card-body p-4">

            <h4 class="mb-1 sfw-normal">
              {{ $weather->location->city }}, {{ $weather->location->country }}
            </h4>
            <p class="mb-2">
              Description: 
              <strong>{{ $weather->description }}</strong>
            </p>
            <p class="mb-2">
              Current temperature: 
              <strong>{{ $weather->temp }}</strong>
            </p>
            <p class="mb-2">
              Current wind speed: 
              <strong>{{ $weather->wind_speed }}</strong>
            </p>
            <p class="mb-2">
              Current pressure: 
              <strong>{{ $weather->pressure }}</strong>
            </p>
            <p class="mb-2">
              Current humidity: 
              <strong>{{ $weather->humidity }}</strong>
            </p>
            
          </div>
        </div>
        @endif

@stop