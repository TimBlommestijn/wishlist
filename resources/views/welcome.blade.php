@extends('layouts.app')

@section('app')
<home-screen-component :user="{{Auth::user() ? Auth::user() : json_encode('name')}}"></home-screen-component>
@endsection
@section('content')
   
@endsection
