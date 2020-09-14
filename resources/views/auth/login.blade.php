@extends('layouts.app')
@section('app')
<welcome-message message="Login Form"></welcome-message>
<login-form csrf-token="{{ csrf_token() }}"></login-form>
@endsection
@section('content')

@endsection
