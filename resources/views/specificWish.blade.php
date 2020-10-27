@extends('layouts.app')
@section('app')
    <wish-screen-component :user="{{Auth::user() ? Auth::user() : json_encode('name')}}" :wish="{{$wish}}"></wish-screen-component>
@endsection

