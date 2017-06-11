@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="/uploads/avatars/{{ $tourist->avatar }}" style="width:140px; height:140px; float:left;
                    border-radius:50%; margin-right: 25px">
                <h2> {{ $tourist->first_name }}'s Profile </h2>
                <form enctype="multipart/form-data" method="POST" action="{{ route('tourist.avatar.submit') }}">
                    <label> Update profile image </label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection