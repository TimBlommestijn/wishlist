@extends('layouts.app')
@section('app')
<welcome-message message="Welcome to the WishList Website" ></welcome-message> 
<wishes-create csrf-token="{{ csrf_token() }}" :editable="false"></wishes-create>
@endsection