@extends('layouts.app')
@section('app')
<welcome-message message="Sign up Form"></welcome-message>
<signup-form csrf-token="{{ csrf_token() }}"></signup-form>
@endsection
@section('content')
@endsection
