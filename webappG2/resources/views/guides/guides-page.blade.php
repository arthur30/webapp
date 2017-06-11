@extends('layouts.app')

@section('content')
    <!-- Page content -->
    <div class="w3-content" style="max-width:1100px;">
        <h2>
            Guides you can contact:
            @foreach($guides as $g)
                {{ $g->name }}
            @endforeach
        </h2>
        <!-- Get guides for a specific city -->
        <div class="w3-container">
            <h3>Guides for {{ $city }}</h3>
            <p>Contact the best guides we have here </p>
        </div>
        <div class="w3-row-padding">
        @foreach($guides as $g)
            <div class="w3-half w3-margin-bottom">
                <img src="/uploads/backgrounds/LasVegas.jpg" alt="LasVegas" style="width:100%">
                <div class="w3-container w3-white">
                    <h3> {{ $g->name }} </h3>
                    <p class="w3-opacity"> {{ $g->nationality }} </p>
                    <button class="w3-button w3-margin-bottom">Contact</button>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection