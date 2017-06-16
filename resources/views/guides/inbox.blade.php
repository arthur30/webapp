@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Inbox</strong></div>

                    <div class="panel-body">
                        <div class="w3-quarter w3-margin-bottom">
                            <div class="w3-container w3-white">
                                <p style="color: #802000"> Tourist name </p>
                            </div>
                        </div>

                        <div class="w3-quarter w3-margin-bottom">
                            <div class="w3-container w3-white">
                                <p style="color: #802000"> Description </p>
                            </div>
                        </div>

                        <div class="w3-half w3-margin-bottom">
                            <div class="w3-container w3-white">
                                <p style="color: #802000"> Message </p>
                            </div>
                        </div>
                        @foreach($messages as $message)
                            <div class="w3-quarter w3-margin-bottom">
                                <div class="w3-container w3-white">
                                    <h3> {{ App\Tourist::find($message->tourist_id)->name }} </h3>
                                </div>
                            </div>

                            <div class="w3-quarter w3-margin-bottom">
                                <div class="w3-container w3-white">
                                    <p> {{ $message->description }} </p>
                                </div>
                            </div>

                            <div class="w3-half w3-margin-bottom">
                                <div class="w3-container w3-white">
                                    <p> {{ $message->message }} </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection