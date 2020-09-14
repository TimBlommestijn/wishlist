@extends('layouts.app')
@section('app')
    <wishes-component :wishes="{{$wishes}}"></wishes-component>

@endsection

