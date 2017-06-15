<!-- Personal page of a guide after clicking contact button -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">A guide page</div>

                    <div class="panel-body">
                        Here will be the page of your guide
                        {{ $guide->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection