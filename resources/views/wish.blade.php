@extends('layouts.app')
@section('app')
    <wishes-screen-component :user="{{Auth::user() ? Auth::user() : json_encode('name')}}" :wishes="{{$wishes}}"></wishesScreen-component>
@endsection

