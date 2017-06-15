<!-- Personal page of a guide after clicking contact button -->
@extends('layouts.app')

@section('content')
    <!-- Guide personal page content -->
    <div class="w3-content" style="max-width:1100px;">
        <div class="w3-container">
            <div class="w3-row-padding">
                <h1 style="text-align: center"> {{ $guide->name }}'s Profile </h1><br>
                <div class="w3-third">
                    <img src="/uploads/backgrounds/LasVegas.jpg" alt="LasVegas" style="width:100%">
                </div>
                <div class="w3-third">
                    <h3><b> Description </b></h3>
                    <p> {{ $guide->description }} </p>
                </div>
                <div class="w3-third">
                    <h3><b> Languages </b></h3>
                    <p> English </p>
                    <h3><b> Top Preferences </b></h3>
                    <p> Hyde Park </p>
                    <p> National History Museum </p>
                    <a href={{ route('about') }}>
                        <button class="w3-button w3-margin-bottom w3-grey">Message {{ $guide->first_name }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection